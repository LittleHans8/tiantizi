<?php

namespace App\Http\Controllers;

use App\GiftCode;
use App\GiftCodeLog;
use App\Http\Utils\Tools;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\AssignOp\ShiftLeft;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class GiftCodeController extends Controller
{

    const MONTH = 0;
    const QUARTER = 1;
    const SIX_MONTHS = 2;
    const YEAR = 3;

    const TINY_TRANSFER_VALUE = 10;
    const SMALL_TRANSFER_VALUE = 30;
    const MEDIUM_TRANSFER_VALUE = 100;
    const BIG_TRANSFER_VALUE = 200;

    // test FLAG TODO DELETE
    const ONE_DAY = 11;

    public $user;

    public function __construct()
    {
        $this->user = \Auth::user();
    }

    public function index(Request $request)
    {

        $msg = "请输入您的礼品码";
        if (!empty($request->gift_code)) {
            $msg = $this->useCode($request->gift_code);
        }
        return view('dashboard.gift')->with('msg', $msg);
    }

    public function useCode($code)
    {
        $this->user = \Auth::user();
        $gift_code = GiftCode::where('code', $code)->where('is_used', 0)->get()->first();
        if (empty($gift_code)) {
            return "礼品码不存在或者已经使用:-)";
        } else {
            $msg = $this->updateUserInfo($gift_code);
            if (!empty($msg)) {
                return $msg;
            }

            $gift_code->is_used = 1; // 记录该礼品码已经使用成功
            $this->updateUserExpiredTime($gift_code);
            $this->updateUserRole($gift_code);
            $this->user->save();
            $gift_code->save();
            $this->updateLogs($gift_code);
            return "礼品码使用成功";
        }
    }

    public function generatePort()
    {
        $ports = User::pluck('port')->toArray();
        $current_max_port = max($ports);
        $port = $current_max_port + 1;
        if ($port > 65536 || empty($current_max_port)) { // 当端口达到最大值时，重新遍历空闲的端口
            $current_max_port = 10000;
            do {
                $port = $current_max_port;
            } while (in_array($port, $ports));
        }

        return $port;
    }

    /**
     * @param $gift_code
     */
    protected function updateUserExpiredTime($gift_code)
    {

        $timestamp_expired_at = strtotime($this->user->expired_at);
        $carbon = new Carbon();// 账号已经过期了
        if (!($timestamp_expired_at < time())) { // 账号还没已经过期了,在原来的日期上叠加上去
            $carbon = new Carbon($this->user->expired_at);
        }
        $transfer_value = $gift_code->transfer_value;
        $transfer_value = Tools::toGB($transfer_value);
        switch ($gift_code->type) {
            case self::MONTH:
                // 只有当 充值的套餐 与 当前的套餐相符时才增加月数，覆盖原来的套餐
                if (($this->user->transfer_enable == $transfer_value)) {
                    $this->user->expired_at = $carbon->addMonth();
                } else {
                    $this->user->transfer_enable = $transfer_value; // 更新用户可以使用的流量
                    $carbon = new Carbon();
                    $this->user->expired_at = $carbon->addMonth();
                }
                break;

            case self::QUARTER:
                if ($this->user->transfer_enable == $transfer_value) {
                    $this->user->expired_at = $carbon->addMonths(3);
                } else {
                    $this->user->transfer_enable = $transfer_value; // 更新用户可以使用的流量
                    $carbon = new Carbon();
                    $this->user->expired_at = $carbon->addMonth(3);
                }
                break;

            case self::SIX_MONTHS:
                if ($this->user->transfer_enable == $transfer_value) {
                    $this->user->expired_at = $carbon->addMonths(6);
                } else {
                    $this->user->transfer_enable = $transfer_value; // 更新用户可以使用的流量
                    $carbon = new Carbon(time());
                    $this->user->expired_at = $carbon->addMonth(6);
                }
                break;
            case self::YEAR:
                if ($this->user->transfer_enable == $transfer_value) {
                    $this->user->expired_at = $carbon->addYear();
                } else {
                    $this->user->transfer_enable = $transfer_value; // 更新用户可以使用的流量
                    $carbon = new Carbon();
                    $this->user->expired_at = $carbon->addYear();
                }
                break;

            case self::ONE_DAY:
                if ($this->user->transfer_enable == $transfer_value) {
                    $this->user->expired_at = $carbon->addDay();
                } else {
                    $this->user->transfer_enable = $transfer_value; // 更新用户可以使用的流量
                    $carbon = new Carbon();
                    $this->user->expired_at = $carbon->addDay();
                }
                break;
        }
    }

    /**
     * 更新 users table 的信息
     * @param $gift_code
     */
    protected function updateUserInfo($gift_code)
    {
        $transfer_value = $gift_code->transfer_value; //
        if ($this->user->transfer_enable > Tools::toGB($transfer_value)) { // 当前用户每个月可用的流量大于要充值的流量
            return "充值失败~礼品卡的流量与您当前的套餐不符";
        } else {
            $this->user->is_vip = 1; // 记录该用户为 vip
            if (empty($this->user->port)) { // 如果用户已经拥有端口，则不需要修改端口
                $this->user->port = $this->generatePort();
            }
            if (empty($this->user->passwd)) { // 如果用户还没有密码，生成一个密码
                $this->user->passwd = str_random(10);
            }
        }
    }

    /**
     * @param $gift_code
     */
    protected function updateUserRole($gift_code)
    {
        $role = Role::where('name', 'vip1')->first();
        switch ($gift_code->transfer_value) {
            case self::TINY_TRANSFER_VALUE:
                break;
            case self::SMALL_TRANSFER_VALUE:
                $role = Role::where('name', 'vip2')->first();
                break;

            case self::MEDIUM_TRANSFER_VALUE:
                $role = Role::where('name', 'vip3')->first();
                break;
            case self::BIG_TRANSFER_VALUE:
                $role = Role::where('name', 'vip4')->first();
                break;
        }
        $this->user->roles()->sync($role);
    }

    public function updateLogs($gift_code)
    {
        $giftCodeLog = new GiftCodeLog();
        $giftCodeLog->user_id = $this->user->id;
        $giftCodeLog->gift_code_id = $gift_code->id;
        $giftCodeLog->save();
    }



    public function generateCode($number = 1, $type = self::MONTH, $transfer_value = self::TINY_TRANSFER_VALUE)
    {
        $codes = array();
        for ($i = 1; $i <= $number; $i++) {
            $str_1 = uniqid("Luckytiantizi");
            $str_2 = str_random(8);
            $str_3 = str_random(12);
            $str_4 = str_random(3);
            $code = $str_1 . "|" . $str_2 . $str_3 . $str_4;
            array_push($codes, $code);
        }
        foreach ($codes as $code) {
            $gift = new GiftCode();
            $gift->code = $code;
            $gift->type = $type;
            $gift->transfer_value = $transfer_value;
            $gift->save();
        }
        return $codes;
    }

}
