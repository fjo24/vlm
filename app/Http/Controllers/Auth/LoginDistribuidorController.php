<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginDistribuidorController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/zonaprivada/listadeprecios';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
