<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Redirect;

class DistribuidorController extends Controller
{
    public function index()
    {
        $activo = 'registro';

        return view('pages.registro', compact('activo'));
    }

    public function registroStore(Request $request)
    {

        $usuario                 = new User();
        $usuario->username  = $request->username;
        $usuario->name      = $request->name;
        $usuario->apellido  = $request->apellido;
        $usuario->social    = $request->social;
        $usuario->cuit      = $request->cuit;
        $usuario->telefono  = $request->telefono;
        $usuario->direccion = $request->direccion;
        $usuario->postal       = $request->postal;
        $usuario->email     = $request->email;
        $usuario->password       = \Hash::make($request->password);
        $usuario->save();

        $success = 'Usuario creado correctamente';
        return redirect('/registro')->with('success', $success);
    }

    public function store(Request $request)
    {

        $distribuidor = DB::table('distribuidores')->where('email', $request->input('email'))->first();
        if (isset($distribuidor)) {
            if ($distribuidor->password == $request->input('password')) {
                session(['distribuidor' => $distribuidor->id]);
                return redirect('zproductos');
            } else {
                $error = "El usuario y/o contraseña son invalidos";
                return back()->with('error');
            }
        } else {
            $error = "El usuario y/o contraseña son invalidos";
            return back()->with('error');
        }
    }
}
