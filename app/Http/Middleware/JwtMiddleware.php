<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Config;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

class JwtMiddleware extends BaseMiddleware {
    /**
     * Midleware, que nos permite validar la autenticacion del usuario
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {
            $error = new \stdClass();
            $error->dev = $e->getMessage();
            $error->params = [];
            $error->code = $e->getCode();
            $error->debug = Config::get('app.debug');
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                $error->error = true;
                $error->msg = ['El Token no es valido ' . $e->getCode()];
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                $error->msg = ["Error " . $e->getCode() . " -> El Token ha expirado "];
            } else {
                $error->msg = ["Error " . $e->getCode() . " -> El token de autorización no funciona "];
            }
            return response()->json($error);
        }
        return $next($request);
    }
}
