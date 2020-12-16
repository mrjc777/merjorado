<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SenavexController extends Controller {
    // DEFINICION DE VARIABLES GLOBALES
    private $token = 'ff090851971389aaa14a969183fcde50';
    private $prefix = ''; // Generalmente es Bearer
    private $urlClient = 'https://www.senavex.gob.bo/api/v1'; // Url del servicio REST web

    // Constructor inicializador del sistema
    function __contruct() {
        $this->middleware('auth:api');
    }

    /**
     * Verificamos el estado del servicio
     * @return object
     */
    function state() {
        $curl = curl_init();
        $url = $this->urlClient . "/estado";
        $header = [
            'Accept: application/json',
            "Authorization: $this->prefix $this->token"
        ];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // Registramos los headers
        curl_setopt($curl, CURLOPT_URL, $url); // ejecutamos la URL del servicio
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        $response = (object) json_decode($result);
        if (isset($response->error)) {
            return (object) ["response" => false, "msg" => $response->error];
        } else {
            return (object) ["response" => true, "msg" => ''];
        }
    }

    /**
     *
     * @param $nit
     * @return \Illuminate\Http\JsonResponse
     */
    function searchNit($nit) {
        $state = $this->state();
        if ($state->response) {
            $curl = curl_init();
            $url = "$this->urlClient/nit/$nit";
            $header = [
                'Accept: application/json',
                "Authorization: $this->prefix $this->token"
            ];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // Registramos los headers
            curl_setopt($curl, CURLOPT_URL, $url); // ejecutamos la URL del servicio
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            // END CONEXION REST
            $response = (object) json_decode($result);
            if (isset($response->nit)) {
                // LOGICA DE NEGOCIO DE LOS DATOS
                return response()->json([
                    "response" => true,
                    "msg" => $response
                ]);
            } else {
                return response()->json([
                    "response" => false,
                    "msg" => "No se ha encontrado datos para el NIT: $nit"
                ]);
            }
        } else {
            return response()->json([
                "response" => false,
                "msg" => "Ocurrio un error: $state->msg"
            ]);
        }
    }

    /**
     * @param $ruex
     * @return \Illuminate\Http\JsonResponse
     */
    function searchRuex($ruex) {
        // Verificamos conexion con el servicio
        $state = $this->state();
        if ($state->response) { // si la respuesta es true
            // BEGIN CONEXCION REST
            $curl = curl_init();
            $url = "$this->urlClient/ruex/$ruex";
            $header = [
                'Accept: application/json',
                "Authorization: $this->prefix $this->token"
            ];
            curl_setopt($curl, CURLOPT_HTTPHEADER, $header); // Registramos los headers
            curl_setopt($curl, CURLOPT_URL, $url); // ejecutamos la URL del servicio
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);
            // END CONEXION REST
            $response = (object) json_decode($result);
            if (isset($response->nit)) {
                // LOGICA DE NEGOCIO DE LOS DATOS
                return response()->json([
                    "response" => true,
                    "msg" => $response
                ]);
            } else {
                return response()->json([
                    "response" => false,
                    "msg" => "No se ha encontrado datos para el RUEX: $ruex"
                ]);
            }
        } else {
            return response()->json([
                "response" => false,
                "msg" => "Ocurrio un error: $state->msg"
            ]);
        }
    }
}
