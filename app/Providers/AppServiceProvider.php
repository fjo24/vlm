<?php

namespace App\Providers;

use App\Dato;
use App\Categoria;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);

        $telefono   = Dato::where('tipo', 'telefono')->first();
        $direccion  = Dato::where('tipo', 'direccion')->first();
        $email      = Dato::where('tipo', 'email')->first();
        $categorias = Categoria::OrderBy('orden', 'ASC')->get();

        view()->share([
            'telefono'   => $telefono,
            'direccion'  => $direccion,
            'email'      => $email,
            'categorias' => $categorias,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
