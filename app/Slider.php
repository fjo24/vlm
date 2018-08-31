<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table    = "sliders";
    protected $fillable = [
        'imagen', 'texto', 'texto2', 'link', 'orden', 'seccion',
    ];
}
