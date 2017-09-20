<?php

namespace App\Http\Controllers;

use App\EventModel;
use App\Korisnici;
use App\Notifikacije;
use App\PregledFalse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ZahtjeviPregledController extends Controller
{
    public function index()
    {

        $zahtjevi = PregledFalse::select('pregled_false.*')
            ->where('imeDoktora', '=', Auth::user()->name)
            ->get();
        return view('zahtjevi', compact('zahtjevi'));

    }

    public function show($id)
    {

        $zahtjevi = PregledFalse::findOrFail($id);

        $transfer = EventModel::all();

        $data = array('title' => $zahtjevi->imePacijenta,
            'startTime' => $zahtjevi->startDate,
            'end' => $zahtjevi->startDate,
            'imeDoktora' => $zahtjevi->imeDoktora
        );

        $eventModel = EventModel::create($data);
        Notifikacije::all();

        $n = array('imeKorisnika' => $zahtjevi->imePacijenta,
            'datum' => $zahtjevi->startDate,
            'imeDoktora' => $zahtjevi->imeDoktora,
            'status' => 1
        );


        Notifikacije::create($n);

        PregledFalse::destroy($id);


        return Redirect::to('zahtjevi');

    }

    public function destroy($id)
    {
        $zahtjevi = PregledFalse::findOrFail($id);

        $n = array('imeKorisnika' => $zahtjevi->imePacijenta,
            'datum' => $zahtjevi->startDate,
            'imeDoktora' => $zahtjevi->imeDoktora,
            'status' => 0
        );
        Notifikacije::create($n);
        PregledFalse::destroy($id);

        return Redirect::to('zahtjevi');
    }
}
