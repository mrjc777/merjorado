<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Json;
use Illuminate\Support\Facades\DB;

class Observacion extends Model
{
    protected $table = 'observaciones';
    protected $fillable = [];
    protected $timestamp = false;

    /**
     * LISTADO DE DATOS
     */


     /**
     * Altas, bajas, modificaciones en la tabla Observaciones
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_obs_abm(?,?,?) as result";
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
