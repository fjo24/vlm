<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgempresa extends Model
{
    protected $table    = "imgempresas";
    protected $fillable = [
        'imagen', 'link', 'orden',
    ];
}
