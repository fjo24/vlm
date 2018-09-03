<?php

namespace App\Http\Controllers\Adm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;

class BannersController extends Controller
{
    public function index()
    {
        $banners = Banner::orderBy('seccion', 'ASC')->paginate(10);
        return view('adm.banners.index')
            ->with('banners', $banners);
    }

    public function edit($id)
    {
        $banner = Banner::find($id);
        return view('adm.banners.edit')
            ->with('banner', $banner);
    }

    public function update(Request $request, $id)
    {
        $banner          = Banner::find($id);
        $id              = Banner::all()->max('id');
        $banner->texto1   = $request->texto1;
        $banner->texto2  = $request->texto2;
        $banner->seccion = $request->seccion;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/banner/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $banner->imagen = 'img/banner/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $banner->update();
        return redirect()->route('banners.index');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->route('banners.index');
    }
}
