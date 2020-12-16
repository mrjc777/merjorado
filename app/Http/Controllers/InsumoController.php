<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Insumo;
use PhpParser\Builder\Function_;

class InsumoController extends Controller
{
    /**
     * Contrcutor,
     */
    public function __contruct() {
        $this->middleware('auth:api');
    }
    /**
     * LISTAR insumos rol empresa para solicitud de incorporacion
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::list($auth, 'INSUMOS_EMPRESA', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * //ABM, insumos rol empresa para solicitud de incorporacion
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::abm($auth, 'CREAR', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ABM, insumos rol empresa para solicitud de incorporacion
     */
    public function destroy($id)
    {
        try {
            $input = [
                'idins' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Insumo::abm($auth, 'ELIMINAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCIONES PERSONALIZADAS PARA SOLICITUD DE MODIFICACION 
     */
    
     /**
     * LISTAR insumos rol empresa para solicitud de modificacion 
     */
     public function listarinsumos()
     {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::ins_mod_list($auth, 'LIS_INSUMOS_EMPRESA', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
     }

     /**
      * ABM insumos rol empresa para solicitud de modificacion 
      */
     
     public function insertarinsumos(Request $request)
     {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::ins_mod_abm($auth, 'CREAR', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
     }

     /**
      * ABM insumos rol empresa para solicitud de modificacion
      */

      public function eliminarainsumos($id)
      {
          try {
              $input = [
                  'idins' => $id
              ];
              $auth = getAuthh(request()->path());
              $resp = Insumo::ins_mod_abm($auth, 'ELIMINAR', $input);
              if (isset($resp->error)) {
                  return response()->json(msgErrorQuery($resp));
              }
              return response()->make($resp)->header('Content-Type', 'application/json');
          } catch (\Exception $e) {
              return response()->json(errorException($e));
          }
      }



    
}
