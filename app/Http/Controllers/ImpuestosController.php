<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImpuestosController extends Controller
{
    // DEFINICION DE VARIABLES GLOBALES
    private $token = 'c2pKc3lOSEhwUExVdklFamNEZ0tmMHRnOGhFYTpFbzlYNUw1ZGZENGRzOVR2dXRoTm1pYTZBeGth';
    private $prefix = 'Basic'; // Generalmente es Bearer
    private $urlClient = 'https://test.idp.impuestos.gob.bo:9443/oauth2'; // Url del servicio REST web

    // Constructor inicializador del sistema
    function __contruct() {
        $this->middleware('auth:api');
    }

    /**
     * Verificamos el estado del servicio
     * @return object
     */
    function createToken() {
        $curl = curl_init();
        $url = $this->urlClient . "/token";
        $header = [
            'Accept: application/json',
            "Authorization: $this->prefix $this->token"
        ];
        $payload = [
            "grant_type" => 'password',
            "username" => 'user.vmci',
            "password" => 'sin.2020-',
            "scope" => 'openid'
        ];
        $uriPayload = '';
        foreach($payload as $i => $val) {
            $uriPayload .= "$i=$val&";
        }
        $uriPayload = trim($uriPayload, '&');

        // $payload = "grant_type=password&username=user.vmci&password=sin.2020-&scope=openid";
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // Registramos los headers
        curl_setopt($curl, CURLOPT_URL, $url); // ejecutamos la URL del servicio
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $uriPayload); // ejecutamos la URL del servicio
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $response = (object) json_decode($result);
        // dd($response);
        if (isset($response->error)) {
            // return response()->json(["response" => false, "msg" => $response->error]);
            return (object) ["response" => false, "msg" => $response->error];
        } else {
            // return response()->json(["response" => false, "msg" => $response]);
            return (object) ["response" => true, "msg" => $response];
        }
    }

    function verificarAdeudo() {
        if($token = $this->createToken()->response) {

        }
    }
}
