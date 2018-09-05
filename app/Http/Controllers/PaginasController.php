<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Producto;
use App\Categoria;
use App\Destacado_home;

class PaginasController extends Controller
{
    public function home()
    {
        $activo    = 'home';
        $ready = 0;
        $sliders   = Slider::orderBy('orden', 'ASC')->Where('seccion', 'home')->get();
        $productos = Producto::OrderBy('orden', 'ASC')->Where('destacado', 1)->get();
        $categorias = Categoria::OrderBy('orden', 'ASC')->get();
        $destacados = Destacado_home::OrderBy('Orden', 'ASC')->get();
        return view('pages.home', compact('sliders', 'activo', 'productos', 'ready', 'destacados', 'categorias'));
    }

    public function productos($id)
    {
        $activo        = 'productos';
        $categoria     = Categoria::find($id);
        $productos     = Producto::orderBy('orden', 'ASC')->Where('categoria_id', $id)->get();
        $ready         = 0;

        return view('pages.productos', compact('categoria', 'productos', 'activo', 'ready'));
    }
}