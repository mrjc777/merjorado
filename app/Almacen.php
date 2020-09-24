<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = 'almacenes';
    protected $fillable = ['direccion', 'tipo_almacen', 'empresa_id'];
    protected $timestamp = false;
}
