<?php

namespace App\Http\Controllers;

use App\Doktor;
use App\Korisnici;
use App\NarudzbaNalazi;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class NalazController extends Controller
{


    public function nalaz($idKorisnik, $idDoktor)
    {
        $a = Korisnici::find($idKorisnik);

        $b = Doktor::find($idDoktor); // dd($a->id) = 1, but $a->id = 0

        $n = new NarudzbaNalazi();

        $n->idKorisnik = $a->id;
        $n->idDoktor = $b->id;
        $n->datum = Carbon::now()->format('Y-m-d');
        $n->save();


        Flash::success('Narudžba za nalaz je uspješna!');
        return Redirect::to('home');
    }

    public function ponisti($idKorisnik, $idDoktor)
    {
        NarudzbaNalazi::destroy($idKorisnik, $idDoktor);

        return Redirect::to('sviUnosi');


    }


}
