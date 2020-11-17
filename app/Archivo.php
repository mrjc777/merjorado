<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Json;
use Illuminate\Support\Facades\DB;

class Archivo extends Model
{
    protected $table = 'archivos';
    protected $fillable = [];
    protected $timestamp = false;

    //Archivo pdf de solicitud Incorporacion firmada por la empresa
    public static function solIncorporacion($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_file_sol_inc_abm(?,?,?) as result";
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
     * FUNCIONES PARA EL CARGADO DE INFORME PERICIAL DE SOLICITUD DE INCORPORACION 
     */

    //(Cargar Informe Pericial y Otros Solicitud de Incorporacion)
    public static function archivoInfPericialInc($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_cargar_archivo_infpericial_incorporacion(?,?,?) as result";
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
     * Eliminacion logica de archivo informe pericial y otros en la Solicitud de Incorporacions 
     */

    public static function archivoInfPericialIncEliminar($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_cargar_archivo_infpericial_incorporacion(?,?,?) as result";
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
     * (Listar Informe Pericial y Otros Solicitud de Incorporacion)
     */
    public static function listarInformes($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_listar_archivo_infpericial_incorporacion(?,?,?) as result";
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
     * FUNCIONES PARA EL CARGADO DE INFORME PERICIAL DE SOLICITUD DE MODIFICACION
     */

    //(Cargar Informe Pericial y Otros Solicitud de Modificacion)
    public static function archivoInfPericialMod($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_cargar_archivo_infpericial_modificacion(?,?,?) as result";
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
     * Eliminacion logica de archivo informe pericial y otros en la Solicitud de Modificacion 
     */

    public static function archivoInfPericialModEliminar($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_cargar_archivo_infpericial_modificacion(?,?,?) as result";
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
