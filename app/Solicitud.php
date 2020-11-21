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
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES INCORPORACION
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
     * ALATAS, BAJAS, MODIFICACIONES PARA LA TABLA SOLICITUDES DE INCORPORACION
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
     * ALATAS, BAJAS, MODIFICACIONES PARA LA TABLA SOLICITUDES DE MODIFICACION
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
     * Listar todas las solicitudes realizadas por la empresa
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
     * Previsualizacion de Solicitud  con codigo generado
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
}
