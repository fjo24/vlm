<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Dato;
use App\Producto;
use App\Banner;
use App\Empresa;
use App\Contenido_quiero;
use Illuminate\Support\Facades\Mail;
use App\Imgempresa;
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

    public function empresa()
    {
        $activo    = 'empresa';
        $empresa = Empresa::all()->first();
        $banner = Banner::Where('seccion', 'empresa')->first();
        $imagenes   = Imgempresa::orderBy('id', 'ASC')->get();
        return view('pages.empresa', compact('empresa', 'activo', 'imagenes', 'tiempos', 'banner'));
    }

    public function productos($id)
    {
        $activo        = 'productos';
        $todos = 'si';
        $categoria     = Categoria::find($id);
        $productos     = Producto::orderBy('orden', 'ASC')->Where('categoria_id', $id)->get();
        $ready         = 0;

        return view('pages.productos', compact('categoria', 'productos', 'activo', 'ready', 'todos'));
    }

    public function productoinfo($id)
    {
        $p     = Producto::find($id);
        $categoria = Categoria::find($p->categoria_id);
        $ready         = 0;
        $relacionados  = Producto::OrderBy('orden', 'ASC')->Where('categoria_id', $p->categoria_id)->get();
        $activo        = 'productos';
        $productos     = Producto::OrderBy('categoria_id', 'ASC')->get();

        return view('pages.productoinfo', compact('categoria', 'productos', 'ready', 'activo', 'p', 'relacionados'));
    }

    public function contacto()
    {
        //return ($producto);
        $activo = 'contacto';
        return view('pages.contacto', compact('activo'));
    }

    public function enviarmailcontacto(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $telefono = $request->telefono;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $mensaje  = $request->mensaje;
       //     dd($producto);
        Mail::send('pages.emails.contactomail', ['nombre' => $nombre, 'telefono' => $telefono, 'empresa' => $empresa, 'email' => $email, 'mensaje' => $mensaje], function ($message){



            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'VLM');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta desde web');

        });
        if (Mail::failures()) {
            return view('pages.contacto', compact('activo'));
        }
        return view('pages.contacto', compact('activo'));
    }

    public function quiero()
    {
        //return ($producto);
        $activo = 'quiero';
        $empresa = Contenido_quiero::all()->first();
        $banner = Banner::Where('seccion', 'quiero')->first();
        return view('pages.quiero', compact('activo', 'banner', 'empresa'));
    }

    public function enviarmailquiero(Request $request)
    {
        $activo   = 'contacto';
        $dato     = Dato::where('tipo', 'mail')->first();
        $nombre   = $request->nombre;
        $telefono = $request->telefono;
        $empresa  = $request->empresa;
        $email    = $request->email;
        $localidad  = $request->localidad;
        $provincia  = $request->provincia;
        $banner = Banner::Where('seccion', 'quiero')->first();
       //     dd($producto);
        Mail::send('pages.emails.quieromail', ['nombre' => $nombre, 'telefono' => $telefono, 'empresa' => $empresa, 'email' => $email, 'localidad' => $localidad, 'provincia' => $provincia], function ($message){

            $dato = Dato::where('tipo', 'email')->first();
            $message->from('info@aberturastolosa.com.ar', 'VLM - Quiero ser distribuidor');

            $message->to($dato->descripcion);

            //Add a subject
            $message->subject('Consulta desde web');

        });
        if (Mail::failures()) {
            return view('pages.quiero', compact('activo', 'banner'));
        }
        return view('pages.quiero', compact('activo', 'banner'));
    }

    public function buscar(Request $request)
    {

        $busqueda = $request->nombre;

        $busca = 1;
        $ready = 0;
        //$metadatos = Metadato::where('section','buscar')->get();
        $activo        = 'productos';
        $todos = 'si';
        $categoria     = Categoria::find(2);

        $productos = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $todos         = Producto::where('nombre', 'like', '%' . $busqueda . '%')->get();
        $ready = 0;

        return view('pages.busqueda', compact('categorias', 'subcategorias', 'productos', 'productos_directos', 'activo', 'todos', 'ready', 'categoria', 'activo'));

    }
}
