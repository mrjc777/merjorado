<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Almacen;

class AlmacenController extends Controller
{
    /**
     * Contrcutor,
     */
    public function __contruct() {
        $this->middleware('auth:api');
    }
    /**
     * LISTAR almacen o instalacion por el rol de la empresa en solicitud de incorporacion
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Almacen::list($auth, 'LISTAR', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ABM nuevo almacen o instalacion por el rol de la empresa en solicitud de incorporacion.
     *
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Almacen::abm($auth, 'CREAR', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ABM eliminar almacen o instalacion por el rol de la empresa en solicitud de incorporacion
     */
    public function destroy($id)
    {
        try {
            $input = [
                'idalm' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Almacen::abm($auth, 'ELIMINAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCIONES PERSONALIZADAS PARA EL FORMULARIO DE MODIFICACION 
     */

    /**
     * LISTAR almacen o instalacion por el rol de la empresa en solicitud de modificacion
     */

     public function listaralmacenes()
     {
        try {
            $auth = getAuthh(request()->path());
            $resp = Almacen::alm_mod_list($auth, 'LISTAR', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
     }

     /**
      * ABM nuevo almacen o instalacion por el rol de la empresa en solicitud de modificacion.
      */
    
      public function insertaralmacenes(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Almacen::alm_mod_abm($auth, 'CREAR', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
      * ABM eliminar almacen o instalacion por el rol de la empresa en solicitud de modificacion.
      */

      public function eliminaralmacenes($id)
      {
          try {
              $input = [
                  'idalm' => $id
              ];
              $auth = getAuthh(request()->path());
              $resp = Almacen::alm_mod_abm($auth, 'ELIMINAR', $input);
              if (isset($resp->error)) {
                  return response()->json(msgErrorQuery($resp));
              }
              return response()->make($resp)->header('Content-Type', 'application/json');
          } catch (\Exception $e) {
              return response()->json(errorException($e));
          }
      }



}
