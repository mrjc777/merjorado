<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresas';
    protected $fillable = ['razon_social', 'direccion', 'ciudad', 'departamento', 'telefono', 'actividad',
                           'representante_legal', 'correo_electronico', 'numero_ruex', 'numero_matricula',
                           'numero_nit', 'carnet_identidad', 'expedido', 'complemento_ci'];
    protected $timestamp = false;
}
