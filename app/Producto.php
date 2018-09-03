<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'oferta', 'descripcion', 'contenido', 'categoria_id', 'video', 'video_descripcion', 'video_titulo', 'orden', 'destacado', 'visible',
    ];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function modelos()
    {
        return $this->belongsToMany('App\Modelo', 'modelo_producto', 'producto_id', 'modelo_id');
    }

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }

    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedido_producto')->withPivot('cantidad', 'costo', 'iva', 'total');
    }

    public function productos()
    {
        return $this->hasMany('App\Producto_relacionado'); 
    }

}