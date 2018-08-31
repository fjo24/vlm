<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imgproducto extends Model
{
    protected $table    = "imgproductos";
    protected $fillable = [
        'imagen', 'producto_id', 'orden',
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
