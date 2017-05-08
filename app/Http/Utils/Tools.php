<?php
/**
 * Created by PhpStorm.
 * User: LittleHans
 * Date: 2017-05-08
 * Time: 14:47
 */

namespace App\Http\Utils;


class Tools
{
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

    /**
     * @param $traffic
     * @return mixed
     */
    public static function toMB($traffic)
    {
        $mb = 1048576;
        return $traffic * $mb;
    }

    /**
     * @param $traffic
     * @return mixed
     */
    public static function toGB($traffic)
    {
        $gb = 1048576 * 1024;
        return $traffic * $gb;
    }

    /**
     * @param $traffic
     * @return float
     */
    public static function flowToGB($traffic)
    {
        $gb = 1048576 * 1024;
        return $traffic / $gb;
    }
}