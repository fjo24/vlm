<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\newsletter;
use Illuminate\Http\Request;
use App\Contenido_home;
use App\Destacado_home;
use App\Slider;

class NewslettersController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::orderBy('email', 'ASC')->get();
        return view('adm.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('adm.newsletters.create');
    }

    public function store(Request $request)
    {
        $activo    = 'home';
        $newsletter        = new Newsletter();
        $newsletter->email = $request->email;

        $newsletter->save();
        $success = 'Correo registrado correctamente';
        return redirect()->route('inicio');
     }

    public function edit($id)
    {
        $newsletter = Newsletter::find($id);
        return view('adm.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, $id)
    {
        $newsletter =
        Newsletter::find($id);
        $newsletter->email = $request->email;

        $newsletter->save();
        return redirect()->route('newsletters.index');
    }

    public function destroy($id)
    {
        $newsletter = Newsletter::find($id);
        $newsletter->delete();
        return redirect()->route('newsletters.index');
    }
}
