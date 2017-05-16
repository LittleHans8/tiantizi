<?php

namespace App\Http\Controllers;

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
        $data_name = ['display_name', 'transfer_enable', 'passwd', 'port', 'method', 'expired_at'];
        if ($role_name == 'free') {
            $data = compact($data_name);
        } else {
            $transfer_enable = $user->transfer_enable;
            $passwd = $user->passwd;
            $port = $user->port;
            $method = $user->method;
            $expired_at = $user->expired_at;
            $data = compact($data_name);
        }

        return $data;
    }

}
