<?php

namespace App\Http\Controllers\adm;

use App\Http\Controllers\Controller;
use App\Metadato;
use Illuminate\Http\Request;

class MetadatosController extends Controller
{
    public function index()
    {
        $metadatos = metadato::orderBy('id', 'ASC')->paginate(10);
        return view('adm.metadatos.index')
            ->with('metadatos', $metadatos);
    }

    public function edit($id)
    {
        $metadato = metadato::find($id);
        return view('adm.metadatos.edit')
            ->with('metadato', $metadato);
    }

    public function update(Request $request, $id)
    {
        $metadato              = metadato::find($id);
        $metadato->keywords    = $request->keywords;
        $metadato->description = $request->description;

        $metadato->save();
        return redirect()->route('metadatos.index');
    }
}
