<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnici extends Model
{
    protected $table = 'korisnicis';

    protected $fillable = ['id','imePrezime', 'imeOca', 'adresa', 'datumRodjenja', 'mjestoPrebivalista', 'statusZaposlenja',
    'bracnoStanje', 'tezina', 'visina', 'alergija', 'jmbg', 'vrstaOsiguranja', 'brojZdravstveneKnjizice'
    , 'email', 'krvnaGrupa', 'idDoktor', 'slika'];


}
