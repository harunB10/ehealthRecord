<?php

namespace App\Http\Controllers;

use App\Evidencija;
use App\Korisnici;
use App\Korisnici_Evidencija;
use App\NarudzbaNalazi;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class EvidencijaController extends Controller
{
    public function evidencija()
    {


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
        return view('evidencija', compact('doktori', 'evidencija'));

    }

    public function store()
    {

        /*$evidencija = DB::table('korisnici_evidencija')
            ->leftjoin('korisnicis', 'korisnici_evidencija.idKorisnik', '=', 'korisnicis.id')
            ->leftjoin('evidencija', 'korisnici_evidencija.idEvidencija', '=', 'evidencija.id')
            ->select('korisnici_evidencija.*', 'evidencija.*', 'korisnicis.*')
            ->where('korisnicis.imePrezime', '=', Input::get('q'))

            ->get();*/


        $korisnici = DB::table('narudzba_za_nalaze')
            ->leftjoin('korisnicis', 'narudzba_za_nalaze.idKorisnik', '=', 'korisnicis.id')
            ->leftjoin('doktor', 'narudzba_za_nalaze.idDoktor', '=', 'doktor.id')
            ->select('narudzba_za_nalaze.*', 'doktor.ime', 'doktor.prezime', 'korisnicis.id', 'korisnicis.imePrezime', 'korisnicis.jmbg'
            ,'narudzba_za_nalaze.datum')
            ->get();


        return view('sviUnosi', compact('korisnici'));

    }

    public function index()
    {

        /*$evidencija = DB::table('korisnici_evidencija')
            ->leftjoin('korisnicis', 'korisnici_evidencija.idKorisnik', '=', 'korisnicis.id')
            ->leftjoin('evidencija', 'korisnici_evidencija.idEvidencija', '=', 'evidencija.id')
            ->select('korisnici_evidencija.*', 'evidencija.*', 'korisnicis.*')
            ->where('korisnicis.imePrezime', '=', Input::get('q'))

            ->get();*/


        $pacijent = Korisnici::select('id', 'imePrezime')->where('imePrezime', '=', Input::get('imePrezime'))
            ->get();
        return view('unos', compact('pacijent'));

    }

    public function show($id)
    {

        $pacijenti = Korisnici::select('id', 'imePrezime')->where('id', '=', $id)
            ->get();
        return view('unos', compact('pacijenti'));
    }

    /*OVA METODA TREBA DA IDE ZA MEDICINSKO OSOBLJE !!!!!!!!!!!!!!!!!!!!!!!!!!!!! */
    public function update($id)
    {
        $file = Input::file('nalaz');
        $destinationPath = 'C:\wamp\www\diplomski\public\pdf';
        $extension = Input::file('nalaz')->getClientOriginalExtension();
        $fileName = rand(11111, 99999) . '.' . $extension;
        Input::file('nalaz')->move($destinationPath, $fileName);


        $insertArray = array('dijagnoza' => Input::get('dijagnoza'),
            'data' => $fileName,
            'lijek' => Input::get('lijek'),
            'nazivUstanove' => Input::get('ustanova'),
            'napomena' => Input::get('napomena'),

        );


        $saveResult = Evidencija::create($insertArray);
        $entity_id = $saveResult->id;
        $insert_secondTable_array = array("idKorisnik" => $id, "idEvidencija" => $entity_id);

        $result = Korisnici_Evidencija::create($insert_secondTable_array);

        Flash::info('Unos je uspješan!');


        return Redirect::to('home');
    }


}
