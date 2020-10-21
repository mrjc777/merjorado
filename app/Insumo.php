<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $fillable = ['codigo_insumo', 'descripcion', 'unidad_medida_id',
                           'partida_arancelaria_id', 'empresa_id'];
    protected $timestamp = false;

    /**
     * lISTADO DE DATOS PARA LA TABLA INSUMOS
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_ins_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla insumos
     */
    public static function abm($auth, $action, $data = [])
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

    /**
     * LISTADO DE DATOS DE LA TABLA INSUMOS DE REGISTROS YA INCORPORADOS, PARA LA MODIFICACION 
     */

    public static function ins_mod_list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_ins_mod_list(?,?,?) as result";
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
     * ALTAS, BAJAS, MODIFICACIONES EN LA TABLA DE INSUMOS PARA SOLICITUD DE MODIFICACION
     */

    public static function ins_mod_abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_ins_mod_abm(?,?,?) as result";
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
