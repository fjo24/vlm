<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modelo;

class ModelosController extends Controller
{
    public function index()
    {
        $modelos = Modelo::orderBy('codigo', 'ASC')->get();
        return view('adm.modelos.index', compact('modelos'));
    }

    public function create()
    {
        return view('adm.modelos.create');
    }

    public function store(Request $request)
    {

        $modelo              = new Modelo();
        $modelo->codigo      = $request->codigo;
        $modelo->orden       = $request->orden;
        $modelo->save();
        return redirect()->route('modelos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $modelo  = Modelo::find($id);
        return view('adm.modelos.edit', compact('modelo', 'modelos'));
    }

    public function update(Request $request, $id)
    {
        $modelo = Modelo::find($id);
        $modelo->codigo = $request->codigo;
        $modelo->orden  = $request->orden;
        $modelo->save();
        return redirect()->route('modelos.index');
    }

    public function destroy($id)
    {
        $modelo = Modelo::find($id);
        $modelo->delete();
        return redirect()->route('modelos.index');
    }
}
