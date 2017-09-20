<?php

namespace App\Http\Controllers;

use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PregledController extends Controller
{
public function index(){

    return view('pregled');
}
}
