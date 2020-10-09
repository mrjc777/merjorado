<?php

namespace App;
use Psy\Util\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EmpresaTipo extends Model
{
    protected $table = 'empresas_tipo';
    protected $fillable = [];
    protected $timestamp = false;
    /**
     * LISTADO DE DATOS
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_empti_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla EMPRESA_TIPO
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_empti_abm(?,?,?) as result";
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
