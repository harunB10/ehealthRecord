<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NarudzbaNalazi extends Model
{
    protected $table = 'narudzba_za_nalaze';
    protected $fillable = ['id', 'idKorisnika', 'idDoktor', 'datum'];
}
