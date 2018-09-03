<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->Where('nivel', '<>', 'distribuidor')->get();
        return view('adm.users.index')
            ->with('users', $users);
    }

    public function create()
    {
        return view('adm.users.create');
    }

    public function store(Request $request)
    {
        $usuario           = new User();
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $usuario->nivel    = $request->nivel;
        $usuario->password = \Hash::make($request->password);
        $usuario->save();

        $users = User::orderBy('id', 'ASC')->Where('nivel', '<>', 'distribuidor')->get();
        return view('adm.users.index')
            ->with('users', $users);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('adm.users.edit')
            ->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        $usuario           = User::find($id);
        $usuario->name     = $request->name;
        $usuario->username = $request->username;
        $usuario->email    = $request->email;
        $usuario->nivel    = $request->nivel;
        if ($request->password != $usuario->password) {
            $usuario->password = \Hash::make($request->password);
        }

        $usuario->save();

        $users = User::orderBy('id', 'ASC')->Where('nivel', '<>', 'distribuidor')->get();
        return view('adm.users.index')
            ->with('users', $users);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }
}
