<?php
// use App\Api;
use Illuminate\Support\Facades\Config;

if (!function_exists('dms')) {
    /**
     * @param $x
     * @return void
     * @throws Exception
     */
    function dms($x) {
        throw new Exception(Json::encode($x), 500);
    }
}

if (!function_exists('getAuthh')) {
    /**
     * @param null $pagina
     * @return array|stdClass
     * @internal param null
     */
    function getAuthh($pagina = null) {
        $resp = \auth()->user();
        $response = new stdClass();
        if ($resp) {
            $response->idsus = $resp->idsus;
            $response->username = $resp->username;
            $response->idsro = $resp->idsro;
            $response->url = isset($pagina) ? $pagina : url()->current();
        }
        return $response;
    }
}

if (!function_exists('msgErrorQuery')) {
    function msgErrorQuery($error) {
        $msgdata = new stdClass();
        $msg = [];
        $msgdata->error = true;
        $msgdata->msg = implode($error->msg);
        $msgdata->dev = $error->dev;
        $msgdata->params = $error->params;
        $msgdata->code = $error->code;
        $msgdata->debug = Config::get('app.debug');
        return $msgdata;
    }
}

if (!function_exists('queryErrorParse')) {
    function queryErrorParse(Illuminate\Database\QueryException $e) {
        $error = new stdClass();
        // Verificamos que exista un error parseado con ## ## objeto
        $msg = utf8_decode($e->getMessage());
        $vmsg = explode('##', $msg);
        if (count($vmsg) > 1) {
            $temp = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $vmsg[1]), true);
            if (!is_null($temp))
                $error->msg = $temp;
            else
                $error->msg = [$vmsg[1]];
        } else {
            $error->msg = ["ERROR: contactese con el administrador del sistema ",
                "CODIGO: " . $e->getCode()
            ];
        }
        $error->error = true;
        $error->dev = $e->getMessage();
        $error->params = $e->getBindings();
        $error->code = 461;
        $error->debug = Config::get('app.debug');
        return $error;
    }
}
if (!function_exists('errorException')) {
    function errorException(Exception $e) {
        $error = new stdClass();
        $error->error = true;
        $error->msg = ['Ocurrio un error de tipo ' . $e->getCode()];
        $error->dev = $e->getMessage();
        $error->params = [];
        $error->code = $e->getCode();
        $error->debug = Config::get('app.debug');
        return $error;
    }
}

if (!function_exists('getFunction')) {
    /**
     * @param null $function
     * obtiene las funciones en la base de datos.
     * @return null
     */
    function getFunction($function = null) {
        $functions = [
            "susLogin" => "select * from sp_sus_list(?, ?, ?) as resp"
        ];
        return $functions[$function];
    }
}
