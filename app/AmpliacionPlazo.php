<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class AmpliacionPlazo extends Model
{
    protected $table = 'ampliacion_plazo';
    protected $fillable = [];
    protected $timestamp = false;

    /**
     * LISTAR TODOS LOS REGISTROS DE AMPLIACION DE PLAZO PARA EL ROL EMPRESA   
     */
    public static function listarRegistroAmpliacion($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_ampliacion_plazo_listar(?,?,?) as result";
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
     * ALTAS BAJAS MODIFICACIONES PARA AMPLIACION DE PLAZO ROL EMPRESA
     */
    public static function abmAmpliacionPlazo($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_ampliacion_plazo_abm(?,?,?) as result";
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
