<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

/**
 * CLASE QUE DEFINIE FUNCIONES Y PRODECIMIENTOS PAR ALA TABLA SEG_USUARIO
 * Class SegUser
 * @package App
 */
class SegUser extends Model {
    /**
     * LISTAMOS LOS MENUS EL USUARIO
     * @param $auth
     * @param $action
     * @param array $data
     * @return array|\stdClass
     */
    public static function getMenus($auth, $action, $data = []) {
        try {
            $sql = "select * from sp_sus_list(?,?,?) as result";
            return DB::select($sql, [
                Json::encode($auth),
                'MENUS',
                Json::encode($data)
            ])[0]->result;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }
}
