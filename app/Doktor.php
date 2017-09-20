<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doktor extends Model
{

    protected $table = 'doktor';
    protected $fillable = ['id', 'ime', 'prezime'];

}
