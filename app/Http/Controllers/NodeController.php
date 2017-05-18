<?php

namespace App\Http\Controllers;

use App\Node;
use Illuminate\Http\Request;

class NodeController extends Controller
{
    public function index()
    {
        $nodes = Node::all();
        return view('dashboard.node',['nodes'=>$nodes]);
    }
}
