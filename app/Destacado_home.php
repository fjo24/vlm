<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado_home extends Model
{
    protected $table    = "destacado_homes";
    protected $fillable = [
        'nombre', 'link', 'orden', 'imagen',
    ];
}
