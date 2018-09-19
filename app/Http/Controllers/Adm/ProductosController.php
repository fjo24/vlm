<?php

namespace App\Http\Controllers\Adm;

use App\Modelo;
use App\Rubro;
use App\Categoria;
use App\Aplicacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductosRequest;
use App\Imgproducto;
use App\Categoria_pregunta;
use App\Producto;
use App\Producto_relacionado;

class ProductosController extends Controller
{
    //

    public function index()
    {
        $ready = 0;
        $productos = producto::orderBy('nombre', 'ASC')->get();
        return view('adm.productos.index', compact('productos', 'ready'));
    }

    public function create()
    {
        $relacionados = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $modelos = Modelo::orderBy('codigo', 'ASC')->pluck('codigo', 'id')->all();
        return view('adm.productos.create', compact('categorias', 'rubros', 'modelos', 'aplicaciones', 'categoria_preguntas', 'relacionados', 'productos'));
    }

    public function store(Request $request)
    {

        $producto                    = new Producto();
        $producto->nombre            = $request->nombre;
        $producto->oferta          = $request->oferta;
        $producto->descripcion       = $request->descripcion;
        $producto->contenido         = $request->contenido;
        $producto->categoria_id      = $request->categoria_id;
        $producto->video   = $request->video;
        $producto->video_descripcion           = $request->video_descripcion;
        $producto->video_titulo= $request->video_titulo;
        $producto->orden             = $request->orden;
        $producto->destacado             = $request->destacado;
        $producto->visible             = $request->visible;
        $producto->precio      = $request->precio;
        $id              = Producto::all()->max('id');
        $id++;

        $producto->save();
        $producto->modelos()->sync($request->get('modelos'));
        $producto->productos()->sync($request->get('productos'));
        return redirect()->route('productos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $producto                    = Producto::find($id);
        $relacionados = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $productos = Producto::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $modelos = Modelo::orderBy('codigo', 'ASC')->pluck('codigo', 'id')->all();
        return view('adm.productos.edit', compact('categorias', 'productos', 'rubros', 'modelos', 'aplicaciones', 'categoria_preguntas', 'relacionados', 'producto'));
    }

    public function update(Request $request, $id)
    {
        $producto                    = Producto::find($id);

        //dd($request->relacionados);
    /*    foreach ($request->relacionados as $rela) {
            $relacionado = new Producto_relacionado();
            $relacionado->producto_a = $id;
            $relacionado->producto_b = 0;
            $relacionado->producto_id = $request->producto->id;
            $relacionado->save();
        }*/

        $producto->nombre            = $request->nombre;
        $producto->oferta          = $request->oferta;
        $producto->descripcion       = $request->descripcion;
        $producto->contenido         = $request->contenido;
        $producto->categoria_id      = $request->categoria_id;
        $producto->video   = $request->video;
        $producto->video_descripcion           = $request->video_descripcion;
        $producto->video_titulo= $request->video_titulo;
        $producto->orden             = $request->orden;
        $producto->destacado             = $request->destacado;
        $producto->visible             = $request->visible;
        $producto->precio      = $request->precio;
        $producto->save();
        $producto->modelos()->sync($request->get('modelos'));
        $producto->productos()->sync($request->get('productos'));
    
        return redirect()->route('productos.index');
    }

    public function destroy($id)
    {
        $producto = producto::find($id);
        $producto->delete();
        return redirect()->route('productos.index');
    }

    //admin de imagenes
    public function imagenes($id)
    {
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();
        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/producto/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgproducto;
                $imagen->imagen   = 'img/producto/' . $id . '_' . $file->getClientOriginalName();
                $imagen->producto_id = $id;
                $imagen->save();
            }
        }
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $id)->get();

        $producto = producto::find($id);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgproducto::find($id);
        $idpro  = $imagen->producto_id;
        $imagen->delete();
        $imagenes = Imgproducto::orderBy('id', 'ASC')->Where('producto_id', $idpro)->get();

        $producto = producto::find($idpro);
        return view('adm.productos.imagenes')->with(compact('imagenes', 'producto'));
    }

    public function presentaciones($id)
    {
        $producto = Producto::find($id);
        return view('adm.productos.presentaciones')->with(compact('producto'));
    }

    public function newPresentacion($id)
    {
        $producto = Producto::find($id);
        $modelos = Modelo::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.productos.newpresentacion')->with(compact('producto', 'modelos'));
    }

    public function storePresentacion(Request $request, $id)
    {
        //dd($request->precio1);
        $producto = Producto::find($id);
        Producto::find($id)->modelos()->attach($producto, ['modelo_id' => $request->modelo_id,'precio1' => $request->precio1, 'precio2' => $request->precio2, 'precio3' => $request->precio3, 'codigo' => $request->codigo]);

        return redirect()->route('presentaciones', $producto->id);
    }

    public function editPresentacion($id, $modelo)
    {
        $producto = Producto::find($id);
        $modelos = Modelo::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        $model = $producto->modelos()->where('modelo_id',$modelo)->get()->first();
        //dd($model);
        return view('adm.productos.editpresentacion')->with(compact('producto', 'model', 'modelos'));
    }

    public function updatePresentacion(Request $request, $id, $modelo)
    {
        //dd($request->precio1);
        $producto = Producto::find($id);
        $model = $producto->modelos()->where('modelo_id',$modelo)->get()->first();
        Producto::find($id)->modelos()->detach($model, ['precio1' => $request->precio1, 'precio2' => $request->precio2, 'precio3' => $request->precio3, 'codigo' => $request->codigo]);
        Producto::find($id)->modelos()->attach($model, ['precio1' => $request->precio1, 'precio2' => $request->precio2, 'precio3' => $request->precio3, 'codigo' => $request->codigo]);

        return redirect()->route('presentaciones', $producto->id);
    }

    public function destroypresentacion(Request $request, $id, $modelo)
    {
        $producto = Producto::find($id);
        $model = $producto->modelos()->where('modelo_id',$modelo)->get()->first();
        Producto::find($id)->modelos()->detach($model, ['precio1' => $request->precio1, 'precio2' => $request->precio2, 'precio3' => $request->precio3]);
        return redirect()->route('presentaciones', $producto->id);
    }
}
