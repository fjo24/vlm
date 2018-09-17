<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table    = "modelos";
    protected $fillable = [
        'nombre','codigo', 'orden',
    ];

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'modelo_producto', 'modelo_id', 'producto_id')->withPivot('precio1', 'precio2', 'precio3');
    }
}
