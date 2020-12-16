<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Empresa;

class EmpresaController extends Controller
{
    public function __contruct() {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $auth = []; // getAuthh(request()->path());
            $resp = Empresa::list($auth, 'PRE_REGISTRO', $data = []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $auth = [];
            $resp = Empresa::abm($auth, 'PRE_REGISTRO', $data = $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    public function rechazar($id)
    {
        try {
            $input = [
                'paid' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Empresa::abm($auth, 'RECHAZAR_PREREGISTRO', $data = $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    public function habilitar(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Empresa::abm($auth, 'HABILITAR', $data = $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    public function listarUsuariosHabilitadosTecnico()
    {
        try {
            $auth = []; // getAuthh(request()->path());
            $resp = Empresa::listarUsuariosHabilitados($auth, 'LISTAR_EMPRESAS_HABILITADAS_TECNICO', $data = []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }
}