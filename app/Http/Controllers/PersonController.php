<?php

namespace App\Http\Controllers;

use App\Http\Utils\Tools;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class PersonController extends Controller
{

    public function index()
    {
        return view('dashboard.person', ['data' => $this->getData()]);

    }

    public function getData()
    {
        $msg_error = '如果您看到这条信息，请联系管理员';
        $total_used = '+∞';
        $progress_value = 100;

        $role_name = 'free';
        $display_name = '免费用户';
        $transfer_enable = '+∞';
        $passwd = 'tiantizi.com';
        $port = 8888;
        $method = 'chacha20';
        $expired_at = '+∞';
        $data = [];
        $user = \Auth::user();
        $role = $user->roles()->first();
        $role_name = $role->name;
        $display_name = $role->display_name;
        $data_name = ['display_name', 'transfer_enable', 'passwd', 'port', 'method', 'expired_at', 'total_used', 'progress_value'];
        if ($role_name == 'free') {
            $data = compact($data_name);
        } else {
            $transfer_enable = Tools::toGB($user->transfer_enable);
            $total_used = $user->u + $user->d;
            $total_used = Tools::toGB($total_used);
            $progress_value = $total_used / $transfer_enable * 100;
            $passwd = $user->passwd;
            $port = $user->port;
            if (empty($port)) {
                $port = $msg_error;
            }
            if (empty($passwd)) {
                $passwd = $msg_error;
            }
            $method = $user->method;
            $expired_at = $user->expired_at;
            if (empty($expired_at)) {
                $expired_at = $msg_error;
            }
            $data = compact($data_name);
        }

        return $data;
    }

}
