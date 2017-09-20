<?php

namespace App\Http\Controllers;

use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Input;

class KartonController extends Controller
{
    public function karton(){


        $doktori = Korisnici::leftJoin('doktor', 'korisnicis.idDoktor', '=', 'doktor.id')
            ->select('doktor.ime', 'doktor.prezime')
            ->where('korisnicis.imePrezime', '=', Auth::user()->name)
            ->where('korisnicis.email', '=', Auth::user()->email)

            ->get();
        $evidencija = DB::table('korisnici_evidencija')
            ->leftjoin('korisnicis', 'korisnici_evidencija.idKorisnik', '=', 'korisnicis.id')
            ->leftjoin('evidencija', 'korisnici_evidencija.idEvidencija', '=', 'evidencija.id')
            ->select('korisnici_evidencija.*', 'evidencija.*', 'korisnicis.*')
            ->where('korisnicis.imePrezime', '=', Auth::user()->name)
            ->where('korisnicis.email', '=', Auth::user()->email)


            ->get();
        return view('karton', compact('doktori', 'evidencija'));
    }

    /*public function pretragaKartona(){

        $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
            ->where('email', '=', Auth::user()->email)
            ->get();

        $pretraga = Korisnici::where('imePrezime', '=', Input::get('q'))
            ->orWhere('email', '=', Input::get('q'))
            ->get();

        return view('kartonPretraga', compact('pretraga', 'korisnici'));
    }*/


}
