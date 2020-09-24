<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['codigo_producto', 'descripcion', 'unidad_medida_id',
        'partida_arancelaria_id', 'empresa_id'];
    protected $timestamp = false;
}
