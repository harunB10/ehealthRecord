<?php

namespace App\Http\Controllers;

use App\Korisnici;
use App\Notifikacije;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class ProfilController extends Controller
{
    public function show()
    {

        return view('profil');
    }

    public function index()
    {

        return view('profil');
    }

    public function contact(){
        Mail::send('emails.mailTest', ['username' => 'test'], function($message){
            $message->to('harun.bajrektarevic@gmail.com');
        });
    }

    public function edit($id){
        $korisnici = Korisnici::find($id);
        return view('profil.edit', compact('korisnici'));
    }

    public function update($id){

        $user = Auth::user();
        if(Input::get('lozinka') === Input::get('lozinka2')){
        $user->password       = bcrypt(Input::get('lozinka'));
        $user->email      = Input::get('email');

        $user->save();}
        else{

            return view('auth.login');
        }
        return Redirect::to('profil');
    }






}
