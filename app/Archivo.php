<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Psy\Util\Json;
use Illuminate\Support\Facades\DB;

class Archivo extends Model
{
    protected $table = 'archivos';
    protected $fillable = [];
    protected $timestamp = false;

    //Archivo pdf de solicitud Incorporacion firmada por la empresa
    public static function solIncorporacion($auth, $action, $data = []) 
    {
        try {
            $sql = "select * from sp_file_sol_inc_abm(?,?,?) as result";
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
