<?php

namespace App;
use Psy\Util\Json;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PartidaAracenlaria extends Model
{
    protected $table = 'partidas_arancelarias';
    protected $fillable = ['partida_arancelaria', 'descripcion'];
    protected $timestamp = false;

    /**
     * LISTADO DE LAS PARTIDAS ARANCELARIAS
     */
    public static function list($auth, $action, $data = [])
    {
        try {
            $sql = "select * from sp_par_list(?,?,?) as result";
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
