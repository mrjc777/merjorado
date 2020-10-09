<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class AduanaRitex extends Model
{
    protected $table = 'serv_aduana_ritex';
    protected $fillable = ['empresa_id', 'tipo_documento', 'nro_documento', 'complemento', 'fecha_nacimiento',
                           'nombres', 'ap_paterno', 'ap_materno', 'telefono', 'telefono_movil', 'correo_electronico'];
    protected $timestamp = false;

    /**
     * lISTADO DE DATOS PARA LA TABLA SERV_ADUANA_RITEX
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_sar_list(?,?,?) as result";
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
     * Altas, bajas, modificaciones en la tabla serv_aduana_ritex
     */
    public static function abm($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_sar_abm(?,?,?) as result";
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
