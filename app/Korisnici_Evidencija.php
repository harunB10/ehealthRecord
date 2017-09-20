<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnici_Evidencija extends Model
{
    protected $table = 'korisnici_evidencija';

    protected $fillable = ['idEvidencija', 'idKorisnik'];
}

