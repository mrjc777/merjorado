<?php

namespace App\Http\Controllers;

use App\Mail\AprobacioMailable;
use App\Mail\PreRegistroMailable;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;
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
            // ENVIAMOS CORREO 
            if (!$this->emailPreRegistroSolicitud($request->all())) {
                return response()->json(["response" => false, "messagge" => 'Se ha registrado, sin embargo tuvimos problemas al enviar el correo de confirmación']);
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
    /**
     * GENERACION DE CORREOS PARA PRE-REGISTROS
     * @param array $datos
     * @return bool
     */
    function emailPreRegistroSolicitud($datos = []) {
        $mail = new PreRegistroMailable($datos);
        Mail::to($datos['correo_electronico'])->queue($mail);
        return true;
    }

    /**
     * GENERACION DE CORREOS PARA APROBACION
     * @param array $datos
     * @return bool
     */
    function emailAprobacion($datos = []) {
        Mail::to('richi617@gmail.com')->locale('es')->queue(new AprobacioMailable($datos));
        return true;
    }
}