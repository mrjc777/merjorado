<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\CreateUser;

class AuthController extends Controller {
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Enmascaramos el validador
        $validator->setAttributeNames(['username' => 'Usuario', 'password' => 'Contraseña']);
        // Caso de error, mandamos el error
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $credentials = request(['username', 'password'], ['user_active' => 1]);
        try {
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
            return $this->respondWithToken($token);
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me() {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout() {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh() {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token) {
        return response()->json([
            'token' => $token,
            'type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function changePassword(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'opw' => 'required',
                'npw' => 'required',
                'rnpw' => 'required',
            ]);
    
            // Enmascaramos el validador
            $validator->setAttributeNames([
                'opw' => 'Contraseña antigua', 
                'npw' => 'Nueva Contraseña',
                'rnpw' => 'Nueva Contraseña'
                ]);
            // Caso de error, mandamos el error
            if ($validator->fails()) {
                return response()->json($validator->errors());
            }
    
            // Datos de usuario logueado
            $auth = getAuthh(request()->path());
    
            // Obtenemos los datos del usuario
            $opw = User::find($auth->idsus);
    
            if(!$opw) {
                throw new Exception('División por cero.');
            }

            // Verificando Contraseña del usuario
            if (!Hash::check($request->input('opw'), $opw->password)) {
                return response()->json(['error' => 'Contraseña incorrecta'], 500);
            }
            
            // Verificando Igualdad de contraseñas
            if($request->input('npw') != $request->input('rnpw')) {
                return response()->json(['error' => 'Las contraseñas no coinciden'], 500);
            }

            // Actualizando password
            $resp = CreateUser::abm($auth, 'CAMBIAR_PASSWORD', ["pw"=>Hash::make($request->input('npw'))]);

            //$resp = CreateUser::abm($auth, 'USUARIO_ALTA', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }

            //ENVIAMOS LA RESPUESTA AL FROND
            return response()->make($resp)->header('Content-Type', 'application/json');

        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
}
