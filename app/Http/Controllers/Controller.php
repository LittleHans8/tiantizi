<?php

namespace App\Http\Controllers;

use App\Http\Utils\Tools;
use App\NodeOnlineLog;
use App\User;
use App\UserTrafficLog;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const Traffic = 1099511627776;
    public function __construct()
    {
        $this->shareData();
    }

    public function shareData()
    {
        $user_count = User::all()->count();
        $user_online_count = NodeOnlineLog::where('node_id', 1)->orderBy('id', 'desc')->first()->online_user;
        $total_traffic = UserTrafficLog::all()->sum('d');
        $total_traffic = $total_traffic + self::Traffic;
        $total_traffic = Tools::flowAutoShow($total_traffic);

        $blank_data = ['user_count', 'user_online_count', 'total_traffic'];
        $blank_data = compact($blank_data);
        \View::share(['blankdata' => $blank_data,]);
    }
}
