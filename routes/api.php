<?php

use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaTipoController;
use App\Http\Controllers\InsumoProductoController;
use App\Http\Controllers\SolicitudController;
use Illuminate\Support\Facades\Route;

use App\Mail\PreregistroMailable;
use Illuminate\Support\Facades\Mail;

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

    /** MODULO DE OPERACIONES SOLICITUD DE INCORPORACION ROL EMPRESA */
    Route::resource('partidas', 'PartidaArancelariaController');
    Route::get('buscarpartida/{partida}', 'PartidaArancelariaController@buscarPartida');
    Route::resource('almacenes', 'AlmacenController');//ABM, LISTAR almacenes o instalaciones de una empresa
    Route::resource('insumos', 'InsumoController');//ABM, LISTAR insumos de una empresa
    Route::resource('productos', 'ProductoController');//ABM, LISTAR insumos de una empresa
    Route::delete('productosinsumotipo/{idpro}/{idins}/{tipo}', 'InsumoProductoController@eliminarTipoProductoInsumo');
    Route::resource('productoinsumo', 'InsumoProductoController');
    Route::resource('aduanaserv', 'AduanaRitexController');
    Route::resource('empresatipo', 'EmpresaTipoController');
    Route::post('subir_informe_inc', 'ArchivoController@setFile');//CARGAR ARCHIVOS, Informe Pericial y otros.
    Route::get('getfiles', 'ArchivoController@getFiles');//LISTAR ARCHIVOS, Informe Pericial y otros.
    Route::delete('eliminar_informe_inc/{id}', 'ArchivoController@eliminarinformes');//ELIMINAR ARCHIVO, Informe Pericial y otros.
    //Route::post('set_sol_inc', 'EmpresaTipoController@setFileSolInc');
    Route::resource('solicitud_incorporacion', 'ArchivoController');
    Route::get('previewinc', 'EmpresaTipoController@getPreview');
    Route::get('listargenerados', 'SolicitudController@listarSolicitudesGeneradasEmpresa');
     /** FIN MODULO DE INCORPORACIONES */

    /** MODULO DE OPERACIONES SOLICITUD DE MODIFICACION ROL EMPRESA */
    Route::get('almacenesmod', 'AlmacenController@listaralmacenes');//LISTAR almacenes o instalaciones de una empresa
    Route::post('insertalm', 'AlmacenController@insertaralmacenes');//ABM almacenes o instalaciones de una empresa
    Route::delete('eliminaralm/{id}', 'AlmacenController@eliminaralmacenes');//ABM almacenes o instalaciones de una empresa
    Route::get('insumosmod', 'InsumoController@listarinsumos');//LISTAR insumos de una empresa
    Route::post('insertarins', 'InsumoController@insertarinsumos');//ABM insumos de una empresa
    Route::delete('eliminarins/{id}', 'InsumoController@eliminarainsumos');//ABM insumos de una empresa
    Route::get('productosmod', 'ProductoController@listarproductos');
    Route::post('insertarpro', 'ProductoController@insertarproductos');
    Route::delete('eliminarpro/{id}', 'ProductoController@eliminarproductos');
    //Route::delete('delproductosinsumotipo/{idpro}/{idins}/{tipo}', 'InsumoProductoController@eliminarTipoProductoInsumoModificacion');
    Route::post('subir_informe_mod', 'ArchivoController@setFileMod');//CARGAR ARCHIVOS, Informe Pericial y otros
    Route::get('getfilesmod', 'ArchivoController@getFilesMod');//LISTAR ARCHIVOS, Informe Pericial y otros.
    Route::delete('eliminar_informe_mod/{id}', 'ArchivoController@eliminarInformesModificacion');//ELIMINAR ARCHIVO, Informe Pericial y otros.
    Route::get('listar_generados_modificacion', 'SolicitudController@listarSolicitudesModificacionGeneradasEmpresa');
    /** FIN MODULO DE MODIFICACIONES*/

    /** MODULO DE OPERACIONES SOLICITUD DE AMPLIACION DE PLAZO ROL EMPRESA */
    Route::resource('ampliacion_plazo', 'AmpliacionPlazoController'); //ABM, LISTAR REGISTRO PARA AMPLIACION DE PLAZO 
    Route::get('listar_generados_ampliacion', 'SolicitudController@listarSolicitudesAmpliacionGeneradasEmpresa'); 
    /* FIN MODULO DE AMPLIACION DE PLAZO */

    /** MODULO DE OPERACIONES SOLICITUD DE RETIRO VOLUNTARIO ROL EMPRESA */
    Route::resource('justificacion_retiro_voluntario', 'RetiroVoluntarioController'); //ABM, LISTAR JUSTIFICACION PARA RETIRO VOLUNTARIO
    Route::get('listar_generados_retiro', 'SolicitudController@listarSolicitudesRetiroGeneradasEmpresa');
    /* FIN MODULO DE RETIRO VOLUNTARIO */

    /**
     * MODULO DE OPERACIONES DEL TECNICO VCI*/
    Route::get('listar_usuarios_habilitados', 'EmpresaController@listarUsuariosHabilitadosTecnico'); //LISTAR LOS USUARIOS HABILITADOS POR EL TECNICO
    Route::delete('rechazar_solicitud_preregistro/{id}', 'EmpresaController@rechazar'); // ELIMINAR SOLICITUD DE PRE REGISTRO POR EL TECNICO
    Route::resource('crearuser', 'CreateUserController');
    Route::resource('observacion', 'ObservacionController');  //OBSERVAR SOLICITUDES
    Route::resource('solicitudes_incorporacion', 'SolicitudController'); //OBTIENE LAS SOLICITUDES DE INCORPORACION REGISTRADAS EN SISTEMA
    Route::get('solicitudes_modificacion', 'SolicitudController@listarSolicitudesTecnico'); //OBTIENE LAS SOLICITUDES DE MODIFICACION REGISTRADAS EN SISTEMA
    Route::delete('eliminar_solicitud_modificacion/{id}', 'SolicitudController@eliminarSolicitudModificacion'); // ELIINAR SOLICITUD DE MODIFICAICON POR EL TECNICO
    Route::resource('cargarsolicitud', 'ArchivoController'); //CARGA LA SOLICITUD FIRMADA POR LA EMPRESA (COMPLETAR)
    Route::resource('aprobar', 'AprobarController'); //APRUEBA LAS SOLICITUDES
    //Route::post('reporteresolucion', 'AprobarController@reporteResolucion'); //resporte resolucion  
    Route::resource('solicitudes_retiro_voluntario', 'RetiroVoluntarioController'); //LISTAR LAS SOLICITUDES DE RETIRO VOLUNTARIO PARA EL TECNICO VCI
     /*FIN MODULO OPERACIONES TECNICO VCI*/

    /**SOLICITUDES PDF INCORPORACION */
    Route::post('pdfprevisualizacion', 'SolicitudController@pdfPrevisualizacion');
    Route::post('pdfsolicitudconcodigo', 'SolicitudController@pdfSolicitudConCodigo');
    /**FIN SOLICITUDES  */

    /**SOLICITUDES PDF MODIFICACION */
    Route::post('pdfprevisualizacionmodificacion', 'SolicitudController@pdfPrevisualizacionModificacion');
    Route::post('pdfsolicitudconcodigomodificacion', 'SolicitudController@pdfSolicitudConCodigoModificacion');
    /**FIN SOLICITUDES */

    /**SOLICITUDES PDF AMPLIACION DE PLAZO */
    Route::post('pdfprevisualizacionampliacion', 'SolicitudController@pdfPrevisualizacionAmpliacion');
    Route::post('pdfsolicitudcodigoampliacion', 'SolicitudController@pdfSolicitudConCodigoAmpliacion');
    /**FIN SOLICITUDES */

    /**SOLICITUDES PDF RETIRO VOLUNTARIO */
    Route::post('pdfprevisualizacionretiro', 'SolicitudeController@pdfPrevisualizacionRetiro');
    Route::post('pdfsolicitudcodigoretiro', 'SolicitudController@pdfSolicitudConCodigoRetiro');
    /**FIN SOLICITUDES */

    /** CAMBIO DE CONSTRASEÑA **/
    Route::post('cambiopass', 'AuthController@changePassword');
    /** FIN CAMBIO DE CONSTRASEÑA **/

    /** SERVICIO WEB ADEUDOS TRIBUTARIOS Y REGISTRO CON LA ADUANA NACIONAL **/
    Route::post('wdsl-consulta', 'WdslController@consultaAdeudoRitex');
    Route::post('wdsl-registro', 'WdslController@registroFormIngreso');
    /** FIN SERVICIO WEB ADUANA NACIONAL**/
    
    /**
     * SERVICIO WEB SENAVEX
     */
    Route::get('senavex/searchNit/{nit}', 'SenavexController@searchNit');
    Route::get('senavex/searchRuex/{ruex}', 'SenavexController@searchRuex');
    /** FIN SERVICIO WEB SENAVEX */
    
    /**
     * SERVICIO WEB IMPUESTOS
     */
    Route::get('impuestos/createToken', 'ImpuestosController@createToken');
    /** FIN SERVICIO WEB IMPUESTOS */

    
});

Route::get('empresas', 'EmpresaController@index');
Route::resource('unidadmedida', 'UnidadMedidaController');
Route::resource('actividad', 'ActividadController');
Route::resource('empresa', 'EmpresaController');
Route::post('reporteresolucion', 'AprobarController@reporteResolucion'); //resporte resolucion 

/** ENVIO DE CORREO ELECTRONICO */

Route::get('preregistro', function () {
    $rs = new stdClass();
    $rs->razonsocial = 'Acme';
    $rs->nit = '654874';
    //$correo = new PreregistroMailable;
    //return View::make('emails.preregistro');
    return response()->view('emails.preregistro', compact('rs'));
    //Mail::to('warigava@gmail.com')->send($correo);


    return "Mensaje Enviado";
});




