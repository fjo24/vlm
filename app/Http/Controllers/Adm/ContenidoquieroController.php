<?php

namespace App\Http\Controllers\Adm;

use App\Contenido_quiero;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContenidoquieroController extends Controller
{
    public function create()
    {
        $homes = Contenido_quiero::all()->first();
        return redirect()->route('quiero.edit', $homes->id);
    }

    public function edit($id)
    {
        $homes = Contenido_quiero::find($id);
        return view('adm.quiero.edit')
            ->with('homes', $homes);
    }

    public function update(Request $request, $id)
    {
        $homes              = Contenido_quiero::find($id);
        $homes->nombre      = $request->nombre;
        $homes->descripcion = $request->descripcion;
        $homes->contenido   = $request->contenido;
        $homes->update();

        return view('adm.dashboard');
    }

}
