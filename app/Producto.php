<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo_producto', 'descripcion', 'unidad_medida_id',
        'partida_arancelaria_id', 'empresa_id'];
    protected $timestamp = false;

    /**
     * lISTADO DE DATOS PARA LA TABLA PRODUCTOS
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_pro_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla productos
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_pro_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    public static function ins_pro_abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_ins_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    public static function listinspro($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_pro_ins_list(?,?,?) as result";
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
     * LISTADO DE DATOS DE LA TABLA PRODUCTOS DE REGISTROS YA INCORPORADOS, PARA LA MODIFICACION
     */

    public static function pro_mod_list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_pro_mod_list(?,?,?) as result";
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
     * ALTAS, BAJAS, MODIFICACIONES EN LA TABLA PRODUCTOS PARA SOLICITUD DE MODIFICACION
     */

    public static function pro_mod_abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_pro_mod_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }


    //del archivo pdf sol modificacion (Informe Pericial y Otros)
    public static function ArchivoSolModificacion($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_file_sol_mod_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    //PREVISUALIZACION DE LA SOLICITUD INCORPORACION 
    public static function preinc($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_preview_inc_list(?,?,?) as result";
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
