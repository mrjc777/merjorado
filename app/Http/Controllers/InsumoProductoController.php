<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;


class InsumoProductoController extends Controller
{
    /**
     * Contrcutor,
     */
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
            $auth = getAuthh(request()->path());
            $resp = Producto::listinspro($auth, 'LISTAR', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
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
            $auth = getAuthh(request()->path());
            $resp = Producto::ins_pro_abm($auth, 'CREAR_INSUMO_PRODUCTO', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ELIMINAR COMBINACION INSUMO PRODUCTO ROL DE AL EMPRESA PARA SOLICITUD DE INCORPORACION 
     */
    public function eliminarTipoProductoInsumo($idpro, $idins, $tipo)
    {
        try {
            $input = [
                'idpro' => $idpro,
                'idins' => $idins,
                'tipo' => $tipo
            ];
            $auth = getAuthh(request()->path());
            $resp = Producto::abm($auth, 'ELIMINAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ELIMINAR COMBINACION INSUMO PRODUCTO ROL DE AL EMPRESA PARA SOLICITUD DE MODIFICACION
     */
    public function eliminarTipoProductoInsumoModificacion($idpro, $idins, $tipo)
    {
        try {
            $input = [
                'idpro' => $idpro,
                'idins' => $idins,
                'tipo' => $tipo
            ];
            $auth = getAuthh(request()->path());
            $resp = Producto::abmProductosInsumos($auth, 'ELIMINAR_INSUMOS_PRODUCTOS_MODIFICACION', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
