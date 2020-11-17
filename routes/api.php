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
    Route::get('buscarpartida/{partida}', 'PartidaArancelariaController@buscarPartida');
    Route::resource('almacenes', 'AlmacenController');
    Route::resource('insumos', 'InsumoController');
    Route::resource('productos', 'ProductoController');
    Route::resource('productoinsumo', 'InsumoProductoController');
    Route::resource('aduanaserv', 'AduanaRitexController');
    Route::resource('empresatipo', 'EmpresaTipoController');
    Route::post('subir_informe', 'ArchivoController@setFile');
    Route::post('eliminar_informe', 'ArchivoController@eliminarinformes');
    Route::post('set_sol_inc', 'EmpresaTipoController@setFileSolInc');
    Route::resource('solicitud_incorporacion', 'ArchivoController');
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
    Route::post('subir_informe', 'ArchivoController@setFileMod');
    Route::post('eliminar_informe', 'ArchivoController@eliminarInformesModificacion');
    Route::get('getfiles', 'ArchivoController@getFiles');
    /** FIN MODULO DE MODIFICACIONES*/

    /**
     * MODULO DE OPERACIONES DEL TECNICO VCI*/
    Route::resource('crearuser', 'CreateUserController');
    Route::resource('observacion', 'ObservacionController');  //OBSERVACION DE LAS SOLICITUDES
    Route::resource('solicitudes', 'SolicitudController'); //OBTIENE LAS SOLICITUDES REGISTRADAS EN SISTEMA
    Route::resource('cargarsolicitud', 'ArchivoController'); //CARGA LA SOLICITUD FIRMADA POR LA EMPRESA (COMPLETAR)
    Route::resource('aprobar', 'AprobarController'); //APRUEBA LAS SOLICITUDES
    //Route::post('reporteresolucion', 'AprobarController@reporteResolucion'); //resporte resolucion  

     /*FIN MODULO OPERACIONES TECNICO VCI*/

    /**SOLICITUDES PDF INCORPORACION */
    Route::post('pdfprevisualizacion', 'SolicitudController@pdfPrevisualizacion');
    Route::post('pdfsolicitudconcodigo', 'SolicitudController@pdfSolicitudConCodigo');
    /**FIN SOLICITUDES  */

    /**SOLICITUDES PDF MODIFICACION */
    
    /**FIN SOLICITUDES */

    /** CAMBIO DE CONSTRASEÑA **/
    Route::post('cambiopass', 'AuthController@changePassword');
    /** FIN CAMBIO DE CONSTRASEÑA **/

    /** SERVICIO WEB ADEUDOS TRIBUTARIOS Y REGISTRO CON LA ADUANA NACIONAL **/
    Route::post('wdsl-consulta', 'WdslController@consultaAdeudoRitex');
    Route::post('wdsl-registro', 'WdslController@registroFormIngreso');
    /** FIN SERVICIO WEB ADUANA NACIONAL**/
});

Route::get('empresas', 'EmpresaController@index');
Route::resource('unidadmedida', 'UnidadMedidaController');
Route::resource('actividad', 'ActividadController');
Route::resource('empresa', 'EmpresaController');
Route::post('reporteresolucion', 'AprobarController@reporteResolucion'); //resporte resolucion  



