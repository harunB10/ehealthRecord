<?php

namespace App\Http\Controllers;

use App\Doktor;
use App\Korisnici;
use App\PregledFalse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class TerminController extends Controller
{
    public function zakaziTermin()
    {

        $doktori = Doktor::all();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = array('imeDoktora' => Input::get('doktor'),
                'startDate' => Input::get('datum'),
                'imePacijenta' => Auth::user()->name,
                'imeDoktora' => Input::get('doktor')
            );

            PregledFalse::create($data);
        }


        return view('termin', compact('doktori'));
    }
}
