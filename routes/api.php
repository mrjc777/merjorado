<?php

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

    Route::resource('partidas', 'PartidaArancelariaController');
    Route::resource('unidadmedida', 'UnidadMedidaController');
    Route::resource('almacenes', 'AlmacenController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('productos', 'ProductoController');

    /** MODULO DE APERACIONES SOLICITUD DE MODIFICACION*/
    Route::get('solModificacion', 'SolicitudController@solModificacion');
    Route::post('solModificacion', 'SolicitudController@postSolModificacion');
    Route::post('deletesolModificacion', 'SolicitudController@postDeleteSolModificacion');
    /** FI MODULO DE OPERACIONES */
});

Route::resource('empresas', 'EmpresaController');

