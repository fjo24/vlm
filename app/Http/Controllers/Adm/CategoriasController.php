<?php

namespace App\Http\Controllers\Adm;

use App\Categoria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriasRequest;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = categoria::orderBy('orden', 'ASC')->get();
        return view('adm.categorias.index', compact('categorias'));
    }

    public function create()
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->pluck('nombre', 'id')->all();
        return view('adm.categorias.create', compact('categorias'));
    }

    public function store(Request $request)
    {

        $categoria              = new Categoria();
        $categoria->nombre      = $request->nombre;
        $categoria->orden       = $request->orden;
        $id                     = Categoria::all()->max('id');
        $id++;
        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/categoria/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/categoria/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $categorias = Categoria::orderBy('nombre', 'ASC')->where('id', '<>', $id)->pluck('nombre', 'id')->all();
        $categoria  = Categoria::find($id);
        return view('adm.categorias.edit', compact('categoria', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->orden  = $request->orden;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/categoria/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $categoria->imagen = 'img/categoria/' . $id . '_' . $file->getClientOriginalName();
            }
        }
        $categoria->save();
        return redirect()->route('categorias.index');
    }

    public function destroy($id)
    {
        $categoria = categoria::find($id);
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
//opcional: carga por excel
    public function excelcat()
    {
        return view('adm.categorias.carga', compact('categorias'));
    }
}
