<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Almacen extends Model
{
    protected $table = 'almacenes';
    protected $fillable = ['direccion', 'tipo_almacen', 'empresa_id'];
    protected $timestamp = false;

    /**
     * Listado de datos de la tabla Almacenes
     */
    public static function list($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_alm_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla almacenes
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_alm_abm(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }

    public static function listmod($auth, $action, $data)
    {
        try {
            $sql = "select * from sp_alm_mod_list(?,?,?) as result";
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
