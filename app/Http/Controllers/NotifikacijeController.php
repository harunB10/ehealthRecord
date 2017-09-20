<?php

namespace App\Http\Controllers;

use App\Korisnici;
use App\Notifikacije;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NotifikacijeController extends Controller
{
    /*
    public function notifikacije()
    {
        $korisnici = Korisnici::where('imePrezime', '=', Auth::user()->name)
            ->where('email', '=', Auth::user()->email)
            ->get();
       $notifikacije = Notifikacije::select('imeKorisnika', 'datum', 'status', 'id')
                        ->where('imeKorisnika', '=', Auth::user()->name)
                        ->orderBy('datum', 'DESC')
                        ->limit(5)
                        ->get();


        $brojac = $notifikacije->count();

        return view('notifikacije', compact('notifikacije', 'brojac', 'korisnici'));

    }*/
    public function notifikacije2()
    {
        $notifikacije = Notifikacije::select('imeKorisnika', 'datum', 'status', 'id')
            ->where('imeKorisnika', '=', Auth::user()->name)
            ->orderBy('datum', 'DESC')->get();


        $brojac = $notifikacije->count();


        return view('notifikacije', compact('notifikacije', 'brojac'));

    }
    public function nId($id)
    {
        $notifikacije = Notifikacije::select('imeKorisnika', 'datum', 'status', 'id')
            ->where('imeKorisnika', '=', Auth::user()->name)
            ->orderBy('datum', 'DESC')->get();

        $not = Notifikacije::find($id);
        $brojac = $not->count();

        return view('nId', compact('not', 'brojac', 'notifikacije'));

    }

}
