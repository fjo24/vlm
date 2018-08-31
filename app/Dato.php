<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dato extends Model
{
    protected $table    = "datos";
    protected $fillable = [
        'tipo', 'descripcion',
    ];
}
