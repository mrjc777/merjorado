<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaTipoController;
use App\Http\Controllers\InsumoProductoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@my_user');
});

Route::group(['middleware' => ['jwt.verify', 'api']], function ($router) {
    Route::get('menus', 'ApiController@menus');

    /** MODULO DE OPERACIONES SOLICITUD DE INCORPORACION*/
    Route::resource('partidas', 'PartidaArancelariaController');
    Route::resource('almacenes', 'AlmacenController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('productos', 'ProductoController');
    Route::resource('productoinsumo', 'InsumoProductoController');
    Route::resource('aduanaserv', 'AduanaRitexController');
    Route::resource('empresatipo', 'EmpresaTipoController');
    Route::post('enviar_archivo', 'EmpresaTipoController@setFile');
    Route::post('sol_mod_file', 'EmpresaTipoController@setFileSol');
    Route::get('previewinc', 'EmpresaTipoController@getPreview');
     /** FIN MODULO DE INCORPORACIONES */

    /** MODULO DE OPERACIONES SOLICITUD DE MODIFICACION*/
    Route::get('almacenesmod', 'AlmacenController@listaralmacenes');
    Route::post('insertalm', 'AlmacenController@insertaralmacenes');
    Route::delete('eliminaralm/{id}', 'AlmacenController@eliminaralmacenes');
    Route::get('insumosmod', 'InsumoController@listarinsumos');
    Route::post('insertarins', 'InsumoController@insertarinsumos');
    Route::delete('eliminarins/{id}', 'InsumoController@eliminarainsumos');
    Route::get('productosmod', 'ProductoController@listarproductos');
    Route::post('insertarpro', 'ProductoController@insertarproductos');
    Route::delete('eliminarpro/{id}', 'ProductoController@eliminarproductos');
    Route::get('getfiles', 'EmpresaTipoController@getFiles');
    /** FIN MODULO DE MODIFICACIONES*/

    /**
     * MODULO DE OPERACIONES DEL TECNICO VCI*/
    Route::resource('crearuser', 'CreateUserController');
    Route::resource('observarsol', 'SolicitudController');
     /*FIN MODULO OPERACIONES TECNICO VCI*/

    /**SOLICITUDES */
    Route::resource('solicitudes', 'SolicitudController');
    /**FIN SOLICITUDES  */
});

Route::get('empresas', 'EmpresaController@index');
Route::resource('unidadmedida', 'UnidadMedidaController');
Route::resource('actividad', 'ActividadController');
Route::resource('empresa', 'EmpresaController');


