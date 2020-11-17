<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\EmpresaTipo;
use App\Producto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use stdClass;

class EmpresaTipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = EmpresaTipo::list($auth, 'LISTAR', []);
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
            // Reglas de validacion de campos obligatorios
            $validator = Validator::make($input = $request->all(), [
                'tipo_ritex' => 'required',
                'sector_ritex' => 'required'
            ]);
            // Verificamos los campos obligatiros
            if($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $auth = getAuthh(request()->path());;
            $resp = EmpresaTipo::abm($auth, 'CREAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $input = [];
            $input['id'] = $id;
            $auth = getAuthh(request()->path());;
            $resp = EmpresaTipo::list($auth, 'MODIFICAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
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
        try {
            // Reglas de validacion de campos obligatorios
            $validator = Validator::make($input = $request->all(), [
                'tipo_ritex' => 'required',
                'sector_ritex' => 'required'
            ]);
            // Verificamos los campos obligatiros
            if($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            $input['id'] = $id;
            $auth = getAuthh(request()->path());;
            $resp = EmpresaTipo::abm($auth, 'MODIFICAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
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
            $input = new stdClass();
            $input->id = $id;
            $auth = getAuthh(request()->path());
            $resp = EmpresaTipo::abm($auth, 'ELIMINAR', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /***
     * Controlador para mostrar la previsualizacion de la solicitud de incorporacion
     */
    public function getPreview(Request $request) {
        try {
            $auth = getAuthh(request()->path());
            $resp = Producto::preinc($auth, 'PREVIEW', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
