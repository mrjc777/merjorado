<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Aprobar extends Model
{
    protected $table = 'resoluciones';
    protected $fillable = [];
    protected $timestamp = false;

    /**
     * Listado de solicitudes Aprobadas
     */
    public static function list($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_res_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla Resoluciones para Solicitudes de Incorporacion
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_res_abm(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla Resoluciones para Solicitudes de Modificacion
     */
    public static function abmResolucionModificacion($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_resolucion_modificacion_abm(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla Resoluciones para Solicitudes de Ampliacion de Plazo
     */
    public static function abmResolucionAmpliacion($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_resolucion_ampliacion_abm(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla Resoluciones para Solicitudes de Retiro Voluntario
     */
    public static function abmResolucionRetiro($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_resolucion_retiro_abm(?,?,?) as result";
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
     * DATOS PARA IMPRESION RA INCORPORACION
     */
    public static function printIncRA($auth, $action, $data = [])
    {
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

    /**
     * DATOS PARA IMPRESION RA MODIFICACION
     */
    public static function printModificacionRA($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_datos_print_ramodificacion(?,?,?) as result";
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
     * DATOS PARA IMPRESION RA AMPLIACION DE PLAZO
     */
    public static function printAmpliacionRA($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_datos_print_raampliacion(?,?,?) as result";
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
     * DATOS PARA IMPRESION RA RETIRO VOLUNTARIO
     */
    public static function printRetiroRA($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_datos_print_raretiro(?,?,?) as result";
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
