<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Metadato extends Model
{
    protected $table    = "metadatos";
    protected $fillable = [
        'seccion', 'keywords', 'description',
    ];
}
