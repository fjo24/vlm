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
        $banner->texto   = $request->texto;
        $banner->texto2  = $request->texto2;
        $banner->link    = $request->link;
        $banner->orden   = $request->orden;
        $banner->seccion = $request->seccion;
        $id++;

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $file = $request->file('imagen');
                $path = public_path('img/slider/');
                $request->file('imagen')->move($path, $id . '_' . $file->getClientOriginalName());
                $slider->imagen = 'img/slider/' . $id . '_' . $file->getClientOriginalName();
            }
        }

        $slider->update();
        return redirect()->route('sliders.index');
    }

    public function destroy($id)
    {
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('sliders.index');
    }
}
