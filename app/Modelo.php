<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table    = "modelos";
    protected $fillable = [
        'codigo', 'orden',
    ];

    public function productos()
    {
        return $this->belongsToMany('App\Producto'); 
    }
}
