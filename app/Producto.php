<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table    = "productos";
    protected $fillable = [
        'nombre', 'oferta', 'descripcion', 'contenido', 'categoria_id', 'video', 'video_descripcion', 'video_titulo', 'orden', 'destacado', 'visible', 'precio', 'codigo',
    ];

    public function imagenes()
    {
        return $this->hasMany('App\Imgproducto');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }

    public function modelos()
    {
        return $this->belongsToMany('App\Modelo', 'modelo_producto')->withPivot('precio1', 'precio2', 'precio3', 'codigo');
    }


    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedido_producto')->withPivot('cantidad', 'costo', 'iva', 'total');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'producto_producto', 'producto_id', 'producto2_id');
    }

}
