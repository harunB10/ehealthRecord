<?php

use App\Korisnici;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('notifikacije', 'NotifikacijeController@notifikacije2');

Route::get('nid/{id}', 'NotifikacijeController@nId');

Route::get('karton', 'KartonController@karton');

/*Route::get('profil', 'ProfilController@profil');*/

Route::group(['middleware' => 'App\Http\Middleware\Doktor'], function () {
    Route::get('/kartonPretraga', function () {


        $pretraga = Korisnici::where('imePrezime', '=', Input::get('q'))
            ->orWhere('email', '=', Input::get('q'))
            ->get();
        $doktori = Korisnici::leftJoin('doktor', 'korisnicis.idDoktor', '=', 'doktor.id')
            ->select('doktor.ime', 'doktor.prezime')
            ->where('korisnicis.imePrezime', '=', Auth::user()->name)
            ->where('korisnicis.email', '=', Auth::user()->email)
            ->get();

        $evidencija = DB::table('korisnici_evidencija')
            ->join('korisnicis', 'korisnici_evidencija.idKorisnik', '=', 'korisnicis.id')
            ->join('evidencija', 'korisnici_evidencija.idEvidencija', '=', 'evidencija.id')
            ->select('korisnici_evidencija.*', 'evidencija.*', 'korisnicis.imePrezime')
            ->where('korisnicis.imePrezime', '=', Input::get('q'))
            ->get();

        return view('kartonPretraga', compact('pretraga', 'doktori', 'evidencija'));

    });

    Route::get('uredi/{idKorisnik}/{idEvidencija}/', 'UrediController@show');
    Route::patch('uredi/{idKorisnik}/{idEvidencija}/', 'UrediController@update');
    Route::resource('pregled', 'CalendarController');
    Route::resource('calendar','CalendarController');
    Route::get('zahtjevi', 'ZahtjeviPregledController@index');
    Route::get('zahtjevi/{id}/prihvati', 'ZahtjeviPregledController@show');
    Route::get('zahtjevi/{id}/odbij', 'ZahtjeviPregledController@destroy');


    Route::get('nalaz/{idKorisnik}/{idDoktor}', 'NalazController@nalaz');


});

Route::group(['middleware' => 'App\Http\Middleware\Osoblje'], function () {
    Route::resource('unos', 'EvidencijaController'); //ZA MEDICINSKO OSOBLJE
    Route::get('unosKartona', 'UnosKartonaController@zaIdDoktora');// MEDICINSKO OSOBLJE

    Route::post('unosKartona', 'UnosKartonaController@unosKartona');// MEDICINSKO OSOBLJE
    Route::get('sviUnosi', 'EvidencijaController@store');//ZA MEDICINSKO OSOBLJE


});
/*
Route::get('nalaz/{idDoktor}/', 'NalazController@register');*/

Route::get('evidencija', 'EvidencijaController@evidencija');

Route::get('contact', 'ProfilController@contact');

Route::get('evidencija', 'EvidencijaController@evidencija');

Route::resource('termin', 'TerminController@zakaziTermin');

Route::get('danasnjiNalaz', 'NalazController@danasnji');

Route::resource('profil', 'ProfilController');



//Route::get('kartonPretraga', 'KartonController@pretragaKartona');





