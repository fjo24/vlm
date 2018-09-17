<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DistribuidoresController extends Controller
{
    //'name', 'username', 'email', 'telefono', 'password',

    public function index()
    {
        $distribuidores = User::orderBy('username', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function create()
    {
        return view('adm.distribuidores.create');
    }

    public function store(Request $request)
    {
        $distribuidor            = new User();
        $distribuidor->activo    = $request->activo;
        $distribuidor->username  = $request->username;
        $distribuidor->name      = $request->name;
        $distribuidor->apellido  = $request->apellido;
        $distribuidor->social    = $request->social;
        $distribuidor->cuit      = $request->cuit;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->direccion = $request->direccion;
        $distribuidor->postal    = $request->postal;
        $distribuidor->email     = $request->email;
        $distribuidor->nivel     = 'distribuidor';
        $distribuidor->password  = \Hash::make($request->password);
        $distribuidor->save();
        

        $distribuidores = User::orderBy('username', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function edit($id)
    {
        $distribuidor = User::find($id);
        return view('adm.distribuidores.edit')
            ->with('distribuidor', $distribuidor);
    }

    public function update(Request $request, $id)
    {
        $distribuidor            = User::find($id);
        if ($distribuidor->nivel != 'administrador' || $distribuidor->nivel != 'usuario' ) {
        $distribuidor->activo    = $request->activo;
        $distribuidor->username  = $request->username;
        $distribuidor->name      = $request->name;
        $distribuidor->apellido  = $request->apellido;
        $distribuidor->social    = $request->social;
        $distribuidor->cuit      = $request->cuit;
        $distribuidor->telefono  = $request->telefono;
        $distribuidor->direccion = $request->direccion;
        $distribuidor->postal    = $request->postal;
        $distribuidor->email     = $request->email;
        $distribuidor->password  = \Hash::make($request->password);
        $distribuidor->save();
        }

        $distribuidores = User::orderBy('username', 'ASC')->Where('nivel', 'distribuidor')->get();
        return view('adm.distribuidores.index')
            ->with('distribuidores', $distribuidores);
    }

    public function destroy($id)
    {
        $Distribuidor = User::find($id);
        $Distribuidor->delete();
        return redirect()->route('distribuidores.index');
    }
}
