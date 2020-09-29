<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo_producto', 'descripcion', 'unidad_medida_id',
        'partida_arancelaria_id', 'empresa_id'];
    protected $timestamp = false;

    /**
     * lISTADO DE DATOS PARA LA TABLA ALMACENES
     * @param $auth
     * @param $action
     * @param array $data
     * @return array
     */
    public static function getStepProductos($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_solmod_listar(?,?,?) as result";
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
