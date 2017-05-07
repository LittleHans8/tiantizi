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

}