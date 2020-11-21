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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){}

    /**
     * FUNCIONES PERSONALIZADAS PARA SOLICITUD DE MODIFICACION 
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
      * INSERTAR PRODUCTOS PARA SOLICITUD DE MODIFICACION
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
