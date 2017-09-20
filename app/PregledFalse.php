<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PregledFalse extends Model
{
    protected $table = 'pregled_false';
    protected $fillable = ['imeDoktora', 'imePacijenta', 'startDate'];
}
