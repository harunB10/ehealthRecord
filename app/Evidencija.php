<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evidencija extends Model
{
    protected $table = 'evidencija';

    protected $fillable = ['dijagnoza', 'nazivUstanove', 'lijek', 'napomena', 'data'];
}
