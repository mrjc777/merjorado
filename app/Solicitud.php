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
     * lISTADO DE DATOS PARA LA TABLA SOLICITUDES
     * 
     */
    
     public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_soli_list(?,?,?) as result";
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
     * ALATAS, BAJAS, MODIFICACIONES PARA LA TABLA SOLICITUDES
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
}
