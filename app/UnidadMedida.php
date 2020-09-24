<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class UnidadMedida extends Model
{
    protected $table = 'unidad_medida';
    protected $fillable = ['unidad_de_medida', 'descripcion'];
    protected $timestamp = false;

    public static function getAll($auth) {
        try {
            return DB::select('select get_all_unidad_medidas(?) as resp', [$auth])[0]->resp;
        } catch (\Illuminate\Database\QueryException $e) {
            return queryErrorParse($e);
        }
    }
}
