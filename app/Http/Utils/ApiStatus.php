<?php

namespace App\Http\Utils;
/**
 * Created by PhpStorm.
 * User: LittleHans
 * Date: 2017-05-07
 * Time: 12:34
 */
class ApiStatus
{

    public static function test()
    {
        return "test";
    }

    public static function status($ret = 1, $msg = null, $data = null)
    {
        $res = [];

        if (!is_null($ret)) {
            $res['ret'] = $ret;
        }
        if (!empty($msg)) {
            $res['msg'] = $msg;
        }
        if (!empty($data)) {
            $res['data'] = $data;
        }
        return $res;
    }

    /**
     * 根据流量值自动转换单位输出
     * @param int $value
     * @return string
     */
    public static function flowAutoShow($value = 0)
    {
        $kb = 1024;
        $mb = 1048576;
        $gb = 1073741824;
        if (abs($value) > $gb) {
            return round($value / $gb, 2) . "GB";
        } else if (abs($value) > $mb) {
            return round($value / $mb, 2) . "MB";
        } else if (abs($value) > $kb) {
            return round($value / $kb, 2) . "KB";
        } else {
            return round($value, 2);
        }
    }

}