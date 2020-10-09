<?php

use App\Http\Controllers\EmpresaTipoController;
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
    Route::resource('almacenes', 'AlmacenController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('productos', 'ProductoController');
    Route::resource('aduanaserv', 'AduanaRitexController');
    Route::resource('empresatipo', 'EmpresaTipoController');

    /** MODULO DE APERACIONES SOLICITUD DE MODIFICACION*/
    Route::get('solModificacion', 'SolicitudController@solModificacion');
    Route::post('solModificacion', 'SolicitudController@postSolModificacion');
    Route::post('deletesolModificacion', 'SolicitudController@postDeleteSolModificacion');
    /** FI MODULO DE OPERACIONES */
});
Route::get('empresas', 'EmpresaController@index');

Route::post('enviar_archivo', 'EmpresaTipoController@setFile');

Route::resource('unidadmedida', 'UnidadMedidaController');


