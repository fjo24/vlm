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

//BUSCADOR
Route::post('productos/buscar', [
    'uses' => 'PaginasController@buscar',
    'as'   => 'buscar',
]);

//QUIERO SER DISTRIBUIDOR
Route::get('/quiero', 'PaginasController@quiero')->name('quiero');
Route::post('enviar-mailquiero', [
    'uses' => 'PaginasController@enviarmailquiero',
    'as'   => 'enviarmailquiero',
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

    /*------------DISTRIBUIDORES----------------*/
    Route::resource('distribuidores', 'Adm\DistribuidoresController')->middleware('admin');

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
    /*------------PRESENTACIONES----------------*/
    Route::get('productos/{id}/presentaciones', [
        'uses' => 'Adm\ProductosController@presentaciones',
        'as'   => 'presentaciones',
    ])->middleware('admin');

    /*------------EDITAR PRESENTACIONES----------------*/
    Route::get('productos/editarpresentacion/{id}/{modelo}', [
        'uses' => 'Adm\ProductosController@editPresentacion',
        'as'   => 'editpresentacion',
    ])->middleware('admin');
    /*-- ACTUALIZAR PRESENTACION --*/
    Route::put('productos/updatepresentacion/{id}/{modelo}', [
        'uses' => 'Adm\ProductosController@updatePresentacion',
        'as'   => 'updatepresentacion',
    ])->middleware('admin');

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
    Route::resource('metadatos', 'Adm\MetadatosController');  
    
});

    /*------------NEWSLETTERS----------------*/
    Route::resource('newsletters', 'Adm\NewslettersController');

    //****************************************ZONA PRIVADA**************************************************************************************************************************************************
Route::get('/zonaprivada/productos', 'ZprivadaController@productos')->name('zproductos')->middleware('auth');

//LISTADO DE PRECIOS
Route::get('/zonaprivada/listadeprecios', 'ZprivadaController@listadeprecios')->name('listadeprecios')->middleware('auth');
// Rutas de reportes pdf desde la web
    Route::get('pdf2/{id}', ['uses' => 'ZprivadaController@downloadPdf2', 'as' => 'file-pdf2']);

//PRODUCTOS FILTRADOS POR CATEGORIAS EN ZONA PRIVADA
Route::get('/zonaprivada/productos/{id}', 'ZprivadaController@productos')->name('zpproductos');

//INFO DE PRODUCTO EN ZONA PRIVADA
Route::get('/zonaprivada/productoinfo/{id}', 'ZprivadaController@productoinfo')->name('zproductoinfo');

//NOVEDADES Y OFERTAS
Route::get('/zonaprivada/ofertasynovedades', 'ZprivadaController@ofertasynovedades')->name('ofertasynovedades')->middleware('auth');


//CARRITO
Route::group(['prefix' => 'carrito'], function () {
    Route::post('add', ['uses' => 'ZprivadaController@add', 'as' => 'carrito.add'])->middleware('auth');
    Route::get('carrito', ['uses' => 'ZprivadaController@carrito', 'as' => 'carrito'])->middleware('auth');
    Route::get('delete/{id}', ['uses' => 'ZprivadaController@delete', 'as' => 'carrito.delete'])->middleware('auth');
    Route::post('enviar', ['uses' => 'ZprivadaController@send', 'as' => 'carrito.enviar'])->middleware('auth');
});