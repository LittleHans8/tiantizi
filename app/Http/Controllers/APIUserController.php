<?php

namespace App\Http\Controllers;

use App\Http\Utils\ApiStatus;
use App\Http\Utils\Tools;
use App\Node;
use App\User;
use App\UserTrafficLog;
use Illuminate\Http\Request;

class APIUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return ApiStatus::status(null, 'ok', $users);
    }

    /**
     * 后端传送案列：{"d":1234,"node_id":1,"u":0}
     *
     *
     * @param Request $request
     * @param $id
     * @return array|\Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     *
     */

    public function addTraffic(Request $request, $id)
    {
        $u = $request->u;
        $d = $request->d;
        $node_id = $request->node_id; // node_id 以 json 的形式传送过来
        $node = Node::find($node_id);
        $user = User::find($id);
//        $user->t = time();
        $user->u += $request->u;
        $user->d += $request->d;
        if (!$user->save()) {
            return response(ApiStatus::status(null, 'update failed'), 400);
        }

        $totalTraffic = Tools::flowAutoShow($u + $d);
        $traffic = new UserTrafficLog();
        $traffic->user_id = $id;
        $traffic->u = $u;
        $traffic->d = $d;
        $traffic->node_id = $node_id;
        $traffic->traffic = $totalTraffic;
        $traffic->log_time = time();
        $traffic->save();
        return ApiStatus::status(1, 'ok');

    }
}
