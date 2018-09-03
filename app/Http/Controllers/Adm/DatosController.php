<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dato;

class DatosController extends Controller
{
    public function index(Request $request)
    {
        $datos = Dato::orderBy('id', 'ASC')->get();
        return view('adm.datos.index')
            ->with('datos', $datos);
    }

    public function edit($id)
    {
        $dato = Dato::find($id);
        return view('adm.datos.edit')
            ->with('dato', $dato);
    }

    public function update(Request $request, $id)
    {
        $dato              = Dato::find($id);
        $dato->descripcion = $request->descripcion;
        $dato->save();

        return redirect()->route('datos.index');
    }
}
