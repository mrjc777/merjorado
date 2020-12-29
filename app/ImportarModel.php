<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class ImportarModel extends Model {
    //
    /**
     * LLAMADA A LA FUNCION DE IMPORTACION DE DATOS PARA INSUMOS Y PRODUCTOS
     * @param $auth
     * @param $action
     * @param array $data
     * @return \stdClass
     */
    public static function importarAbm($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_import_abm(?,?,?) as resp";
            return DB::select($sql, [
                Json::encode($auth),
                $action,
                Json::encode($data)
            ])[0]->resp;
        } catch (QueryException $e) {
            return queryErrorParse($e);
        }
    }
}
