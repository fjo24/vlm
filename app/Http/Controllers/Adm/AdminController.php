<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{

    public function index()
    {
        return view('zproductos');
    }

    public function dashboard()
    {
        return redirect()->route('login');
        //return view('login');
    }

    public function admin()
    {
        return view('adm.dashboard');
    }

}
