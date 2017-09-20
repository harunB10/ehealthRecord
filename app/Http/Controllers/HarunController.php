<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HarunController extends Controller
{

    public function test(){
        $a = DB::table('event_models')->select('startTime')->where('id', '=', 1)->get();
        $b = DB::table('event_models')->select('end')->where('id', '=', 1)->get();

        return view('harun', compact(var_dump($b[0])));
    }
}
