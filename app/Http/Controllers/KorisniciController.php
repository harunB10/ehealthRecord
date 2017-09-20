<?php

namespace App\Http\Controllers;

use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KorisniciController extends Controller
{
    public function korisnici()
    {


        $doktori = Korisnici::leftJoin('doktor', 'korisnicis.id', '=', 'doktor.id')
            ->select('doktor.ime', 'doktor.prezime')
            ->where('korisnicis.imePrezime', '=', Auth::user()->name)
            ->where('korisnicis.email', '=', Auth::user()->email)

            ->get();




        return view('home', compact('doktori'));

    }





}


