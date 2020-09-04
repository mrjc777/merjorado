<?php

namespace App\Http\Controllers;


use App\SegUser;
use Exception;

class ApiController extends Controller {

    public function __contruct() {
        $this->middleware('auth:api');
    }

    /*
     * RETORNAMOS LOS USUARIOS DEL SISTEMA
     */
    public function menus() {
        try {
            $auth = getAuthh(request()->path());
            $lis = SegUser::getMenus($auth, 'MENUS', []);
            if (isset($lis->error)) {
                return response()->json(msgErrorQuery($lis));
            }
            return response()->make($lis)->header('Content-Type', 'application/json');
        } catch (Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
