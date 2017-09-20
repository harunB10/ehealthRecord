<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Doktor;

use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class UnosKartonaController extends Controller
{
    public function zaIdDoktora()
    {
        $doktor = DB::table('doktor')->select('doktor.ime', 'doktor.prezime', 'doktor.id')->get();
        return view('unosKartona', compact('doktor'));


    }

    public function unosKartona()
    {

        $file = Input::file('slika');
        $destinationPath = 'C:\wamp\www\diplomski\public\slike';
        $extension = Input::file('slika')->getClientOriginalExtension();
        $fileName = rand(11111, 99999) . '.' . $extension;
        Input::file('slika')->move($destinationPath, $fileName);

        $id = Input::get('doktor');

        $int = intval(preg_replace('/[^0-9]+/', '', $id), 10);


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = array('imePrezime' => Input::get('imePrezime'),
                'imeOca' => Input::get('imeOca'),
                'adresa' => Input::get('adresa'),
                'datumRodjenja' => Input::get('datumRodjenja'),
                'mjestoPrebivalista' => Input::get('mjestoPrebivalista'),
                'statusZaposlenja' => Input::get('statusZaposlenja'),
                'bracnoStanje' => Input::get('bracnoStanje'),
                'tezina' => Input::get('tezina'),
                'visina' => Input::get('visina'),
                'alergija' => Input::get('alergija'),
                'jmbg' => Input::get('jmbg'),
                'vrstaOsiguranja' => Input::get('vrstaOsiguranja'),
                'brojZdravstveneKnjizice' => Input::get('brojKnjizice'),
                'email' => Input::get('email'),
                'krvnaGrupa' => Input::get('krvnaGrupa'),
                'slika' => $fileName,
                'idDoktor' => $int
            );

            Korisnici::create($data);
            Flash::info('Unos je uspješan!');

            return Redirect::to('unosKartona');
        }
    }
}
