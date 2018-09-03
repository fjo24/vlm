<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    public function handle($request, Closure $next)
    {
        if (auth()->user()->nivel == 'administrador') {
            return $next($request);
        }
        return redirect()->route('zproductos');
        //->with('error', 'NO TIENES PERMISO PARA ACCEDER A ESTA AREA')
    }
}
