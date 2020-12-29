<?php

namespace App\Http\Controllers;

use App\ImportarModel;
use App\ImportModel;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ImportarController extends Controller {

    /**
     * IMPORTAR PRODUCTOS
     * @param Request $request
     * @return JsonResponse|Response|mixed}
     */
    function importProduct(Request $request) {
        try {
            // REGLAS DE VALIDACIÓN
            // obligatorio, debe ser un archivo, debe tener las extensiones xlsx, xls
            $validator = Validator::make($request->all(), [
                'template' => 'required|file|mimes:xlsx,xls'
            ]);
            // Caso de error, mandamos el error
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            // Obtenemos los datos de autenticacion
             $auth = getAuthh(request()->path());
           // $auth = ["idsro" => 3, "idsus" => 15];
            // Transformamos los datos del excel en un array<object>
            $rows = Excel::toArray(new ImportModel(), $request->file('template'))[0];
            // return response()->json($rows);
            // Enviamos los datos al servidor de base de datos funcion importar
            $resp = ImportarModel::importarAbm($auth, 'IMPORTAR_PRODUCTOS', $rows);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * IMPORTACION DE INSUMOS
     * @param Request $request
     * @return JsonResponse|Response|mixed
     */
    function importInsumo(Request $request) {
        try {
            // REGLAS DE VALIDACIÓN
            // obligatorio, debe ser un archivo, debe tener las extensiones xlsx, xls
            $validator = Validator::make($request->all(), [
                'template' => 'required|file|mimes:xlsx,xls'
            ]);
            // Caso de error, mandamos el error
            if ($validator->fails()) {
                throw new Exception($validator->errors()->first());
            }
            // Obtenemos los datos de autenticacion
            // $auth = getAuthh(request()->path());
            $auth = ["idsro" => 3, "idsus" => 15];
            // Transformamos los datos del excel en un array<object>
            $rows = Excel::toArray(new ImportModel(), $request->file('template'))[0];
            //return response()->json($rows);
            // Enviamos los datos al servidor de base de datos funcion importar
            $resp = ImportarModel::importarAbm($auth, 'IMPORTAR_INSUMOS', $rows);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
