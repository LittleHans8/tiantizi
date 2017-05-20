<?php

namespace App\Http\Controllers;

use App\Node;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NodeController extends Controller
{
    const FREE = 0;
    const VIP = 1;
    const TYPE = "type";

    public function index()
    {

        $user = Auth::user();
        $nodes = Node::where(self::TYPE, self::VIP)->get();
        $free_nodes = Node::where(self::TYPE, self::FREE)->get();
        if ($user->hasRole('free')) {
            $nodes = array();
        }
        return view('dashboard.node', ['user' => $user, 'nodes' => $nodes, 'free_nodes' => $free_nodes]);
    }
}
