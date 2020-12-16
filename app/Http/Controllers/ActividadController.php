<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Actividad;

class ActividadController extends Controller
{
    /**
     * Verificacion JWT-AUTH
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
            $auth = []; // getAuthh(request()->path());
            $resp = Actividad::list($auth, 'ACTIVIDAD', $data = []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
