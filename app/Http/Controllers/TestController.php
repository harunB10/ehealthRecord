<?php

namespace App\Http\Controllers;

use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
   public function test(){
       $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
           ->where('email', '=', Auth::user()->email)
           ->get();

       return view('test', compact('korisnici'));
   }
}
