<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AmpliacionPlazo;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\App;
use Barryvdh\DomPDF\Facade as PDF;

use function GuzzleHttp\json_decode;

class AmpliacionPlazoController extends Controller
{
    /**
     * Constrcutor
     */
    public function __contruct()
    {
        $this->middleware('auth:api');
    }
    
    /**
     * FUNCION PARA LISTAR TODOS LOS REGISTROS DE AMPLIACION DE PLAZO POR EL ROL EMPRESA 
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = AmpliacionPlazo::listarRegistroAmpliacion($auth, 'LISTAR_REGISTROS_AMPLIACION_PLAZO', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ABM CREAR REGISTROS DE AMPLIACION DE PLAZO POR EL ROL EMPRESA.
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = AmpliacionPlazo::abmAmpliacionPlazo($auth, 'CREAR_AMPLIACION_PLAZO', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**ABM ELIMINAR REGISTRO DE AMPLIACION DE PLAZO POR EL ROL EMPRESA */
    public function destroy($id)
    {
        try {
            $input = [
                'idamp' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = AmpliacionPlazo::abmAmpliacionPlazo($auth, 'ELIMINAR_REGISTRO_AMPLIACION_PLAZO', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
