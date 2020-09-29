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
     * lISTADO DE DATOS PARA LA TABLA ALMACENES
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function getStepAlmacenes($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_solmod_listar(?,?,?) as result";
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
     * TRANSACCIONES PARA SOLICITUDES
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function setStepAlmacenes($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_almacenes_abm(?,?,?) as result";
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
