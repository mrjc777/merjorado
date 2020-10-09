<?php

namespace App\Http\Controllers;

use App\Almacen;
use App\Insumo;
use App\Producto;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Psy\Util\Json;

class SolicitudController extends Controller
{
    private $auth;
    public function __construct() {
        $this->auth = getAuthh(request()->path());
    }
    //
    public function solModificacion(Request $request) {
        try{
            $paso = $request->input('paso');
            if(!isset($paso))
                throw new \Exception('No existe la variable paso');
            switch (intval($paso)) {
                case 1:
                    return $this->generateStep1();
                break;
                case 2:
                    return  $this->generateStep2();
                break;
                case 3:
                    return $this->generateStep3();
                break;
                case 4:
                    return $this->generateStep4();
                break;
                case 5:
                    return $this->generateStep5();
                default:
                    throw new \Exception('No existe el paso solicitado');
                    break;
            }
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * generamos el paso 1,, esta funcion debe verificar si econtiene datos
     */
    function generateStep1() {
        try {
            // Obtenemos los datos de atuenticacion del usuario
            //$auth = getAuthh(request()->path());
            // llamamos a la funcion de generacion de datos en la BD
            $data = Almacen::getStepAlmacenes($this->auth, 'PASO1', []);
            // Verificamos si existe algun error en base de datos
            if(isset($data['error'])) {
                return \response()->make($data);
            }
            // si todo esta OK, mandamos la infomracion de data
            return \response()->make($data)->header('Content-Type', 'application/json');

        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    function generateStep2() {
      try {
            $auth = getAuthh(request()->path());
            $data = Insumo::getStepInsumos($auth, 'PASO2', []);
            if(isset($data['error'])){
                return \response()->make($data);
            }
            return \response()->make($data)->header('Content-Type', 'application/json');

        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }


    }

    function generateStep3() {
        try {
            $auth = getAuthh(request()->path());
            $data = Producto::getStepProductos($auth, 'PASO3', []);
            if(isset($data['error'])){
                return \response()->make($data);
            }
            return \response()->make($data)->header('Content-Type', 'application/json');

        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }


    }

    /**
     * Registramos/Actualizamos las modificaciones
     */
    function postSolModificacion(Request $request) {
        try {

            $validator = Validator::make($request->all(), [
                'step' => 'required|numeric'
            ]);

            // Caso de error, mandamos el error
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
            $paso = $request->input('step');
            if(!isset($paso))
                throw new \Exception('No existe la variable paso');
            switch (intval($paso)) {
                case 1:
                    return $this->postUpdateInsertStep1($request);
                    break;
                default:
                    throw new \Exception('No existe el paso solicitado');
                    break;
            }
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * REGISTRAMOS O ACTUALIZAMOS LOS DATOS DEL PASO 1
     * @param $request
     */
    function postUpdateInsertStep1(Request $request) {
        $validator = Validator::make($request->all(), [
            'direccion' => 'required',
            'tipo' => 'required'
        ]);

        // Caso de error, mandamos el error
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $auth = getAuthh(request()->path());

        // PARAMETRO DE ENTRADA, QUE VIENE DESD EL FROND END (SON LOS IMPUTS DE LOS CAMPOS)
        $input = $request->input();

        return \response()->json($input);

        $data = Almacen::setStepAlmacenes($auth, 'PASO1', $input);
        // Verificamos si existe algun error en base de datos
        if(isset($data['error'])) {
            return \response()->make($data);
        }
    }
}
