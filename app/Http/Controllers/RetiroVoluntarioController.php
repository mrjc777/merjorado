<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RetiroVoluntario;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\App;
use Barryvdh\DomPDF\Facade as PDF;

use function GuzzleHttp\json_decode;

class RetiroVoluntarioController extends Controller
{
    /**
     * Constrcutor
     */
    public function __contruct()
    {
        $this->middleware('auth:api');
    }

    /**
     * FUNCION PARA LISTAR TODAS LAS JUSTIFICACIONES DE RETIRO VOLUNTARIO POR EL ROL EMPRESA 
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = RetiroVoluntario::listarRetiroVoluntario($auth, 'LISTAR_JUSTIFICACION_RETIRO_VOLUNTARIO', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }


    /**
     * ABM CREAR JUSTIFICACION DE RETIRO VOUNTARIO POR EL ROL EMPRESA.
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = RetiroVoluntario::abmRetiroVoluntario($auth, 'CREAR_JUSTIFICACION_RETIRO_VOLUNTARIO', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**ABM ELIMINAR JUSTIFICACION DE RETIRO VOUNTARIO POR EL ROL EMPRESA */
    
    public function destroy($id)
    {
        try {
            $input = [
                'idrvo' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = RetiroVoluntario::abmRetiroVoluntario($auth, 'ELIMINAR_JUSTIFICACION_RETIRO_VOLUNTARIO', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
