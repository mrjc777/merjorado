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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::list($auth, 'LISTAR', []);
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
     * FUNCIONES PERSONALIZADAS PARA EL FORMULARIO DE MODIFICACION 
     */

     public function listmod()
     {
        try {
            $auth = getAuthh(request()->path());
            $resp = Insumo::listmod($auth, 'LIS_INSUMOS_EMPRESA', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
     }

    
}
