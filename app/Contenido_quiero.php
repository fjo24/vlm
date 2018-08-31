<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contenido_quiero extends Model
{
    protected $table    = "contenido_quieros";
    protected $fillable = [
        'nombre', 'descripcion', 'contenido',
    ];
}
