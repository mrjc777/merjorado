<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $table = 'insumos';
    protected $fillable = ['codigo_insumo', 'descripcion', 'unidad_medida_id',
                           'partida_arancelaria_id', 'empresa_id'];
    protected $timestamp = false;
}
