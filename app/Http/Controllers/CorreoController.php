<?php

namespace App\Http\Controllers;

use App\Mail\AprobacioMailable;
use App\Mail\PreRegistroMailable;
use App\SegUser;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use stdClass;

class CorreoController extends Controller
{
    /**
     * FUNCION TEMPORAR PARA PRE REGISTRO
     * @return JsonResponse
     */
    public function preRegistro(Request $request) {
        try {
            // SON LOS DATOS NESESARIOS PARA LA GENERACION DEL CORREO ELECTRONICO, SE DEBE OBTENER DEL LOS IMPUTS DEL FRONT
            // END A LA HORA DE HACER EL PRE-REGISTRO
            dd($request->all());
            $datos = new stdClass();
            $datos->representanteLegal = 'Richard Quenta';
            $datos->razonSocial = 'Integrate Soluciones Informaticas';
            if ($this->emailPreRegistroSolicitud($datos)) {
                return response()->json(["response" => true, "messagge" => 'Pre Registro satisfactorio']);
            } else {
                return response()->json(["response" => false, "messagge" => 'Ocuirrio un error']);
            }
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCION TEMPORAL PARA APROBACION
     * @return JsonResponse
     */
    function aprobacion() {
        try {
            $datos = new stdClass();
            $datos->representanteLegal = 'Richard Quenta';
            $datos->razonSocial = 'Integrate Soluciones Informaticas';
            $datos->usuario = 'rquenta';
            $datos->password = 'asdfjkaDDsd';
            if ($this->emailAprobacion($datos)) {
                return response()->json(["response" => true, "messagge" => 'Pre Registro Aprobacion satisfactorio']);
            } else {
                return response()->json(["response" => false, "messagge" => 'Ocuirrio un error']);
            }
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
        Mail::to('richi617@gmail.com')->queue($mail);
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
