<?php

namespace App\Http\Controllers;

use App\Http\Utils\ApiStatus;
use App\Http\Utils\Tools;
use App\Node;
use App\NodeInfoLog;
use App\NodeOnlineLog;
use App\User;
use App\UserTrafficLog;
use Illuminate\Http\Request;

class APINodeController extends Controller
{
    public function users()
    {
        $users = User::all();
        return ApiStatus::status(null, 'ok', $users);
    }

    public function onLineUserLog(Request $request, $id)
    {
        $node_id = $id;
        $log = new NodeOnlineLog();
        $log->node_id = $node_id;
        $log->online_user = $request->count;
        if (!$log->save()) {
            return ApiStatus::status(0, 'update failed');
        } else {
            return ApiStatus::status(1, 'ok');
        }

    }

    public function info(Request $request, $id)
    {
        $node_id = $id;
        $load = $request->load;
        $uptime = $request->uptime;

        $log = new NodeInfoLog();
        $log->node_id = $node_id;
        $log->load = $load;
        $log->uptime = $uptime;
        $log->log_time = time();
        if (!$log->save()) {
            return ApiStatus::status(0, 'update failed');
        } else {
            return ApiStatus::status(1, 'ok');
        }

    }

    public function postTraffic(Request $request, $id)
    {
        $node_id = $id;
        $node = Node::find($node_id);
        $datas = $request->getInputSource();

        foreach ($datas as $data) {
            $user = User::find($data['user_id']);
            $user->t = time();
            $user->u += $data['u'];
            $user->d += $data['d'];
            $user->save();

            //log
            $totalTraffic = Tools::flowAutoShow($data['u'] + $data['d']);
            $traffic = new UserTrafficLog();
            $traffic->user_id = $data['user_id'];
            $traffic->u = $data['u'];
            $traffic->d = $data['d'];
            $traffic->node_id = $node_id;
            $traffic->traffic = $totalTraffic;
            $traffic->log_time = time();
            $traffic->save();

        }
    }
}
