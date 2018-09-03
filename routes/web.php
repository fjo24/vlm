<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::post('logindistribuidor', 'Auth\LoginDistribuidorController@login')->name('logindistribuidor');

Route::get('/home', 'Adm\AdminController@admin')->name('home');

//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);

/*******************ADMIN************************/
    Route::prefix('adm')->middleware('admin')->middleware('auth')->group(function () {


    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard')->middleware('admin');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin')->middleware('admin');

    /*------------BANNERS----------------*/
    Route::resource('banners', 'Adm\BannersController')->middleware('admin');

    /*------------CONTENIDO HOMES----------------*/
    Route::resource('homes', 'Adm\ContenidohomesController')->middleware('admin');

    

    //****************************************ZONA PRIVADA**************************************************************************************************************************************************
	Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');
    
});