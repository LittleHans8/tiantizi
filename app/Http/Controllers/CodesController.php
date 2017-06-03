<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CodesController extends Controller
{
    public function index()
    {
        $codes = DB::table('gift_codes')
            ->where('type', 11)
            ->where('is_used', 0)
            ->where('transfer_value', 10)->paginate(15);
        return view('code', ['codes'=>$codes]);
    }
}
