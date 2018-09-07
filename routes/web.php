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

Route::get('/', 'PaginasController@home')->name('inicio');

Auth::routes();
Route::post('logindistribuidor', 'Auth\LoginDistribuidorController@login')->name('logindistribuidor');

Route::get('/home', 'Adm\AdminController@admin')->name('home');

//EMPRESAS
Route::get('/empresa', 'PaginasController@empresa')->name('empresa');

//CONTACTO
Route::get('/contacto', 'PaginasController@contacto')->name('contacto');
Route::post('enviar-mailcontacto', [
    'uses' => 'PaginasController@enviarmailcontacto',
    'as'   => 'enviarmailcontacto',
]);

//REGISTRO DE DISTRIBUIDORES
Route::get('registro', ['uses' => 'DistribuidorController@index', 'as' => 'registro']);
Route::post('/registro', ['uses' => 'DistribuidorController@store', 'as' => 'cliente.store']);
Route::post('/nuevousuario', ['uses' => 'DistribuidorController@registroStore', 'as' => 'registro.store']);

//PRODUCTOS FILTRADOS POR CATEGORIAS

Route::get('productos/{id}', 'PaginasController@productos')->name('productos');

//CATEGORIAS
Route::get('/categorias', 'PaginasController@categorias');

//INFO DE PRODUCTO
Route::get('productoinfo/{id}', 'PaginasController@productoinfo')->name('productoinfo');

/*******************ADMIN************************/
    Route::prefix('adm')->middleware('admin')->middleware('auth')->group(function () {


    Route::get('/', 'Adm\AdminController@dashboard')->name('dashboard')->middleware('admin');

    //DASHBOARD
    Route::get('/dashboard', 'Adm\AdminController@admin')->middleware('admin');

    /*------------BANNERS----------------*/
    Route::resource('banners', 'Adm\BannersController')->middleware('admin');

    /*------------CATALOGOS----------------*/
    Route::resource('catalogos', 'Adm\CatalogosController')->middleware('admin');
    // Rutas de reportes pdf
    Route::get('pdf/{id}', ['uses' => 'Adm\CatalogosController@downloadPdf', 'as' => 'file-pdf']);

    /*------------SECCION QUIERO----------------*/
    Route::resource('quiero', 'Adm\ContenidoquieroController')->middleware('admin');

    /*------------DATOS----------------*/
    Route::resource('datos', 'Adm\DatosController')->middleware('admin');

    /*------------DESTACADOS HOMES----------------*/
    Route::resource('destacadosh', 'Adm\DestacadohomesController')->middleware('admin');

    /*------------EMPRESAS----------------*/
    Route::resource('empresas', 'Adm\EmpresasController')->middleware('admin');
    //agregar imagenes de seccion empresas
    Route::post('empresas/{id}/imagen/', 'Adm\EmpresasController@nuevaimagen')->name('nuevaimagenemp'); //es el store de las img de empresa
    Route::delete('imgempresa/{id}/destroy', [
        'uses' => 'Adm\EmpresasController@destroyimg',
        'as'   => 'imgempresa.destroy',
    ])->middleware('admin');

    /*------------CATEGORIAS----------------*/
    Route::resource('categorias', 'Adm\CategoriasController')->middleware('admin');

    /*------------MODELOS----------------*/
    Route::resource('modelos', 'Adm\ModelosController')->middleware('admin');
    
    /*------------PRODUCTOS----------------*/
    Route::resource('productos', 'Adm\ProductosController')->middleware('admin');
    /*------------Imagen----------------*/
    Route::get('producto/{producto_id}/imagenes/', 'Adm\ProductosController@imagenes')->name('imgproducto.lista'); //index del modulo imagenes
    //agregar nuevas imagenes de productos
    Route::post('producto/nuevaimagen/{id}', 'Adm\ProductosController@nuevaimagen')->name('imgproducto.nueva'); //es el store de las imagenes
    Route::delete('imgproducto/{id}/destroy', [
        'uses' => 'Adm\ProductosController@destroyimg',
        'as'   => 'imgproducto.destroy',
    ])->middleware('admin');

    /*------------SLIDERS----------------*/
    Route::resource('sliders', 'Adm\SlidersController')->middleware('admin');

    /*------------USERS----------------*/
    Route::resource('users', 'Adm\UsersController')->middleware('admin');

    /*------------METADATOS----------------*/
    Route::resource('metadatos', 'adm\MetadatosController');

    //****************************************ZONA PRIVADA**************************************************************************************************************************************************
	Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');
    
});