<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Solicitud extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = ['empresa_id', 'codigo', 'tipo', 'observacion'];
    protected $timestamp = false;

    /**
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES INCORPORACION DEL USUARIO TECNICO
     * 
     */
    
     public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_solicitudes_incorporacion_list(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES MODIFICACION DEL USUARIO TECNICO
     * 
     */
    
    public static function listarSolicitudesModificacionesTecnico($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_solicitudes_modificacion_list(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * LISTADO DE DATOS PARA LA TABLA SOLICITUDES AMPLIACION DE PLAZO DEL USUARIO TECNICO 
     */
    public static function listarSolicitudesAmpliacionTecnico($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_solicitud_ampliacion_plazo_listar(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES RETIRO VOLUNTARIO DEL USUARIO TECNICO
     * 
     */
    
    public static function listarSolicitudesRetiroTecnico($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_solicitud_retiro_voluntario_listar(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

     /**
     * ALATAS, BAJAS, MODIFICACIONES PARA SOLICITUDES DE INCORPORACION TECNICO
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_soli_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES DE MODIFICACION
     * 
     */
    
    public static function listMod($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_solicitudes_modificacion_list(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * ALTAS, BAJAS, MODIFICACIONES PARA SOLICITUDES DE MODIFICACION TECNICO
     */
    public static function abmMod($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_sol_mod_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * ALTAS, BAJAS, MODIFICACIONES PARA SOLICITUDES DE AMPLIACION DE PLAZO TECNICO
     */
    public static function abmAmpliacionPlazoTecnico($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_solicitud_ampliacion_plazo_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /**
     * ALTAS, BAJAS, MODIFICACIONES PARA SOLICITUDES DE RETIRO VOLUNTARIO TECNICO
     */
    public static function abmRetiroVoluntarioTecnico($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_solicitud_retiro_voluntario_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }



    /***
     * Previsualizacion de Solicitud  sin codigo generado
     */
    public static function previsualizacionPDF($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_datos_print_raincorporacion(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /***
     * Listar todas las solicitudes de incorporacion realizadas por la empresa
     */
    public static function getSolicitudesGeneradas($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_soli_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

     /***
     * Listar todas las solicitudes de modificacion realizadas por la empresa
     */
    public static function getSolicitudesModificacionGeneradas($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_sol_mod_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /***
     * Listar todas las solicitudes de ampliacion de plazo realizadas por la empresa
     */
    public static function getSolicitudesAmpliacionGeneradas($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_solicitud_ampliacion_plazo_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

     /***
     * Listar todas las solicitudes de retiro voluntario realizadas por la empresa
     */
    public static function getSolicitudesRetiroGeneradas($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_solicitud_retiro_voluntario_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /***
     * Generar Solicitud con codigo para Incorporacion
     */
    public static function pdfSolicitudConCodigo($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_soli_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }
    
    /***
     * Generar Solicitud con codigo para Modificacion
     */
    public static function pdfSolicitudConCodigoMod($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_sol_mod_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    /***
     * Generar Solicitud con codigo para Ampliacion de Plazo
     */
    public static function pdfSolicitudConCodigoAmpliacion($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_solicitud_ampliacion_plazo_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

     /***
     * Generar Solicitud con codigo para Retiro Voluntario
     */
    public static function pdfSolicitudConCodigoRetiro($auth, $action, $data=[]){
        try {
            $sql = "select * from sp_solicitud_retiro_voluntario_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }
}
