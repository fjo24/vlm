<?php

namespace App\Http\Controllers\Adm;

use App\Empresa;
use App\Imgempresa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmpresaRequest;

class EmpresasController extends Controller
{
    //'nombre', 'descripcion', 'contenido', 'imagen', 'link',

    public function create()
    {
        $empresa = Empresa::all()->first();
        return redirect()->route('empresas.edit', $empresa->id);
    }

    public function edit($id)
    {
        $empresa = Empresa::find($id);
        $imagenes = Imgempresa::orderBy('id', 'ASC')->get();
        return view('adm.empresas.edit')->with(compact('imagenes', 'empresa'));
    }

    public function update(Request $request, $id)
    {
        $empresa              = Empresa::find($id);
        $empresa->nombre      = $request->nombre;
        $empresa->descripcion = $request->descripcion;
        $empresa->contenido   = $request->contenido;
        $empresa->link        = $request->link;

        $empresa->update();

        return redirect()->route('empresas.edit', $empresa->id);
    }

    public function nuevaimagen(Request $request, $id)
    {
        if ($request->HasFile('file')) {
            foreach ($request->file as $file) {
                $filename = $file->getClientOriginalName();
                $path     = public_path('img/empresa/');
                $file->move($path, $id . '_' . $file->getClientOriginalName());
                $imagen              = new Imgempresa;
                $imagen->imagen   = 'img/empresa/' . $id . '_' . $file->getClientOriginalName();
                $imagen->save();
            }

        }

        $empresa  = Empresa::find($id);
        $imagenes = Imgempresa::orderBy('id', 'ASC')->get();
        return view('adm.empresas.edit')->with(compact('imagenes', 'empresa'));
    }

    public function destroyimg($id)
    {
        $imagen = Imgempresa::find($id);
        $imagen->delete();
        $imagenes = Imgempresa::orderBy('id', 'ASC')->get();
        return redirect()->route('empresas.create');
    } 
}
