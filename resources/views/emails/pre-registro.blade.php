@extends('emails.template');
@section('content')
    <h2>Solicitud Pre Registro</h2>
    <p>Sr. {{@$data['representante_legal']}} </p>

    <p> Se ha realizado la solicitud de usuario ante el Viceministerio de Comercio Interno para utilizar el Formulario
        Digital de Solicitudes RITEX a nombre de la empresa: <strong>{{@$data['razon_social']}}</strong>.
    </p>
@stop
