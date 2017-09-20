<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikacije extends Model
{
    protected $table = 'notifikacije';

    protected $fillable = ['id', 'imeKorisnika', 'datum', 'status', 'imeDoktora'];

    public function brojac($query)
    {
        Notifikacije::where('imeKorisnika', '=', Auth::user()->name)
            ->count();
    }

}
