<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
      /**
     * Contrcutor,
     */
    public function __contruct() {
        $this->middleware('auth:api');
    }

    /**
     * LISTAR productos solicitud de incorporacion
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Producto::list($auth, 'LISTAR', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ABM productos solicitud de incorporacion
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Producto::abm($auth, 'CREAR', $request->input());
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
     * LISTAR productos solicitud de modificacion
     */ 
    public function listarproductos()
    {
       try {
           $auth = getAuthh(request()->path());
           $resp = Producto::pro_mod_list($auth, 'LIS_PRODUCTOS_EMPRESA', []);
           if (isset($resp->error)) {
               return response()->json(msgErrorQuery($resp));
           }
           return response()->make($resp)->header('Content-Type', 'application/json');
       } catch (\Exception $e) {
           return response()->json(errorException($e));
       }
    }

    /**
      * ABM productos solicitud de modificacion
      */
     
      public function insertarproductos(Request $request)
      {
         try {
             $auth = getAuthh(request()->path());
             $resp = Producto::pro_mod_abm($auth, 'CREAR', $request->input());
             if (isset($resp->error)) {
                 return response()->json(msgErrorQuery($resp));
             }
             return response()->make($resp)->header('Content-Type', 'application/json');
         } catch (\Exception $e) {
             return response()->json(errorException($e));
         }
      }

      /**
      * ELIMINACION LOGICA DE PRODUCTOS EN SOLICITUD DE MODIFICACION
      */

      public function eliminarproductos($id)
      {
          try {
              $input = [
                  'idpro' => $id
              ];
              $auth = getAuthh(request()->path());
              $resp = Producto::pro_mod_abm($auth, 'ELIMINAR', $input);
              if (isset($resp->error)) {
                  return response()->json(msgErrorQuery($resp));
              }
              return response()->make($resp)->header('Content-Type', 'application/json');
          } catch (\Exception $e) {
              return response()->json(errorException($e));
          }
      }
}
