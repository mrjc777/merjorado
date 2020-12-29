@extends('email.template');
@section('content')
    <h2>Solicitud Pre Registro</h2>
    <p>Sr. {{@$data->representanteLegal}} </p>
    <p>Su solicitud de usuario para utilizar el Formulario Digital de Solicitudes RITEX a nombre de la empresa
        <i>{{@$data->razonSocial}}</i> ha sido autorizada.</p>
    <p>Puede ingresar al sistema con los siguientes datos:</p>
    <p>
        <strong>USUARIO:</strong> <i>{{@$data->usuario}}</i> <br>
        <strong>CONTRASEÑA:</strong> <i>{{@$data->password}}</i>
    </p>
    <p>Se recomienda cambiar la contraseña una vez que ingrese al sistema</p>
@stop
