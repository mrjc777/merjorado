<?php

namespace App;
use Psy\Util\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['razon_social', 'direccion', 'ciudad', 'departamento', 'telefono', 'actividad',
                           'representante_legal', 'correo_electronico', 'numero_ruex', 'numero_matricula',
                           'numero_nit', 'carnet_identidad', 'expedido', 'complemento_ci'];
    protected $timestamp = false;
    /**
     * LISTADO DE DATOS
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_emp_list(?,?,?) as result";
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
     * LISTADO DE EMPRESAS REGISTRADAS Y HABILITADAS
     */
    public static function listreg($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_emp_list(?,?,?) as result";
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
     * FUNCIONES PARA REALIZAR LAS TRANSACCION ALTAS, BAJAS, MODIFICACIONES EN LA TABLA EMPRESA
     */
    public static function abm($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_emp_abm(?,?,?) as result";
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
