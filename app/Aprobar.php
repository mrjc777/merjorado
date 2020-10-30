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
     * Altas, bajas, modificaciones en la tabla Resoluciones
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
}
