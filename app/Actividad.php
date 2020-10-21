<?php

namespace App;
use Psy\Util\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Actividad extends Model
{
    protected $table = 'actividades';
    protected $fillable = [];
    protected $timestamp = false;

    /**
     * LISTADO DE LAS ACTIVIDADES DE LAS EMPRESAS EN EL PRE REGISTRO
     */

    public static function list($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_act_list(?,?,?) as result";
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
