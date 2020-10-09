<?php

namespace App;
use Psy\Util\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';
    protected $fillable = ['unidad_de_medida', 'descripcion'];
    protected $timestamp = false;

    /**
     * LISTADO DE LAS UNIDADES DE MEDIDA Y SU DESCRIPCION
     */
    public static function list($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_ume_list(?,?,?) as result";
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
