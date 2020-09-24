<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartidaAracenlaria extends Model
{
    protected $table = 'partidas_arancelarias';
    protected $fillable = ['partida_arancelaria', 'descripcion'];
    protected $timestamp = false;

}
