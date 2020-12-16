<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class RetiroVoluntario extends Model
{
    protected $table = 'retiro_voluntario';
    protected $fillable = [];
    protected $timestamp = false;

    /**
     * LISTAR TODAS LAS JUSTIFICACIONES RETIROS VOLUNTARIOS PARA EL ROL EMPRESA   
     */
    public static function listarRetiroVoluntario($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_justificacion_retiro_voluntario_listar(?,?,?) as result";
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
     * ALTAS BAJAS MODIFICACIONES PARA JUSTIFICACIONES DE RETIRO VOLUNTARIO ROL EMPRESA
     */
    public static function abmRetiroVoluntario($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_justificacion_retiro_voluntario_abm(?,?,?) as result";
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
