<?php

namespace App\Http\Controllers;

use App\Evidencija;
use App\Korisnici;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class UrediController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($idKorisnik, $idEvidencija)
    {

        $pacijenti = Korisnici::select('id', 'imePrezime')->where('id', '=', $idKorisnik)
            ->get();
        $evidencija = Evidencija::findorFail($idEvidencija);
        return view('uredi', compact('pacijenti', 'evidencija'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idKorisnik, $idEvidencija)
    {

        $pacijenti = Korisnici::select('id', 'imePrezime')->where('id', '=', $idKorisnik)
            ->get();

        $evidencija = Evidencija::findorFail($idEvidencija);

        $evidencija->dijagnoza = Input::get('dijagnoza');
        $evidencija->lijek = Input::get('lijek');
        $evidencija->napomena = Input::get('napomena');
        $evidencija->save();

        Flash::success('Unos pregleda je uspješan!');
        return Redirect::to('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
