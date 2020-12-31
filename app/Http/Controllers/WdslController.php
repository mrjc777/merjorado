<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Spatie\ArrayToXml\ArrayToXml;

class WdslController extends Controller {
    //
    private $privateKey;
    private $publicKey;
    private $idUser = 'PKsF3NvaG1n/rRBHc2j0bw==';
    private $urlSoapClient = 'http://deslogic01.aduana.gob.bo:7001/wsritex/wsritex?WSDL';

    // Constructor inicializador del sistema
    function __contruct() {
        $this->middleware('auth:api');
    }

    /**
     * DEFINIMOS LAS VARIABLES GLOBALES
     */
    function declareAndVerifyKeys() {
        $urlPrivateKey = storage_path('keys/vciPrivado.pem');
        $urlPublicKey = storage_path('keys/anbpub.pem');
        if (!file_exists($urlPrivateKey) || !file_exists($urlPublicKey)) {
            return false;
        }
        if (!$this->privateKey = openssl_get_privatekey(File::get($urlPrivateKey)))
            return false;
        if (!$this->publicKey = openssl_get_publickey(File::get($urlPublicKey)))
            return false;
        return true;
    }

    /**
     * Consulta Adeudo RITEX
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @noinspection PhpUndefinedMethodInspection
     */
    public function consultaAdeudoRitex(Request $request) {
        try {
            // Declaramos las llaves publicas, privadas y el id del usuario
            if (!$this->declareAndVerifyKeys()) {
                throw new Exception('No se ha podido encontrar las llaves publica o privada, o los archivos nos son válidos');
            }

            // VALIDAMOS EL FORMULARIO DE ENTRADA SEGUN DOCUMENTACION ADJUNTA PDF
            $validator = Validator::make($request->all(), [
                //'tipoDocumento' => 'required|max:3', hoy comentadoi
                'nit' => 'required|max:15' // cambiamos de nroDocumento a nit
                //'lugarExpedicion' => 'size:2', hoy comentadoi
            ]);
            if ($validator->fails()) {
                $erno = [];
                foreach (array_keys($validator->errors()->toArray()) as $val) {
                    $erno[] = $validator->errors()->first($val);
                }
                throw new Exception(implode(", ", $erno));
            }

            // CONTINUAMOS CON LA VALIDACIÓN input = tipodocuemnto, nroDocumento, lugarExpedicion
            $input = (object) $request->all();
            // GENERACION DEL XML DE CONSULTA DEUDA
            $consultaDeuda = ArrayToXml::convert([
            
                //'tipoDocumento' => $input->tipoDocumento, hoy comentadoi
                'nit' => $input->nit //cambiamos de nroDocumento a nit
                //'lugarExpedicion' => $input->lugarExpedicion hoy comentadoi
            ], 'consultaAdeudoRitex', true, 'UTF-8', '1.0', [], true);
            //dd($consultaDeuda);

            // ENCRIPTAMOS LA PETICION
            if (!openssl_private_encrypt($consultaDeuda, $enc, $this->privateKey)) {
                throw new Exception('No se ha podiddo realizar la encriptacion de los datos con la clave privada');
            }
            // Defiminos los parametros que se enviaran al cliente SOAP
            $params = [
                'identificador' => $this->idUser,
                'cadenaXML' => base64_encode($enc)
            ];
            // CONECTANDO CON WDSL
            $client = new \SoapClient($this->urlSoapClient);
            // EJECUTAMOS LA CONSULTA CON EL SERVICIO
            $respConsultaAdeudo = $client->getConsultaAdeudoRitex($params);
            // En caso de no encontrar la funcion de llamada
            if (!$respConsultaAdeudo) {
                throw new Exception('No se ha podido encontrar la funcion getConsultaAdeudoRitex');
            }
            // CUSTOMIZAMOS EL RESULTADO DE SALIDA
            $response = ''; // Respuesta en formato XML
            if(is_array($respConsultaAdeudo->return)) { // Caso que la respuesta sea un Array
                if (count($respConsultaAdeudo->return) > 0) {
                    // Iteramos la respuesta y concatenamos los resultados XML
                    foreach ($respConsultaAdeudo->return as $rc) {
                        if (!openssl_public_decrypt(base64_decode($rc), $dec, $this->publicKey)) {
                            throw new Exception('No se ha podido desencriptar el resultado de la llamada');
                        }
                        // Concatenamos las respuestas XML
                        $response .= $dec;
                    }
                }
            } else { // En caso que la respuesta no sea un Array
                if (!openssl_public_decrypt(base64_decode($respConsultaAdeudo->return), $dec, $this->publicKey)) {
                    throw new Exception('No se ha podido desencriptar el resultado de la llamada');
                }
                // Concatenamos las respuestas XML
                $response .= $dec;
            }


            // CONVERTIMOS LA RESPUESTA XML EN ARRAY ITERABLE
            $objectXML = simplexml_load_string($response);
            // dd($objectXML);
            $responseArray = (array) json_decode(json_encode($objectXML), true);

            // Verificamos si existe un codError
            if(isset($responseArray['codError'])) {
                // VERIFICAMOS LOS CODIGOS DE ERROR
                throw new Exception("COD: " . $responseArray['codError'] . " -> " . $responseArray['descError']);
            }
            
            // RETORNAMOS LOS DATOS VERIFICADOS
            return response()->json([
                "response" => true,
                "message" => $responseArray
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "response" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /**
     * Creamos y Registramos el formulario de Ingreso
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registroFormIngreso(Request $request) {
        try {
            // Declaramos las llaves publicas, privadas y el id del usuario
            if (!$this->declareAndVerifyKeys()) {
                throw new Exception('No se ha podido encontrar las llaves publica o privada, o los archivos nos son válidos');
            }

            // VALIDAMOS EL FORMULARIO DE ENTRADA SEGUN DOCUMENTACION ADJUNTA PDF
            $validator = $this->validatorRegister($input = (object) $request->all());
            if (count($validator) > 0) {
                throw new Exception(implode(", ", $validator));
            }

            // ADECUACIONES NESESARIAS PARA GENERAR EL XML
            $arrayToXml = ArrayToXml::convert((array) $this->clearInput($input),
                'documento', true, 'UTF-8', '1.0', [], true);

            // ENCRIPTAMOS LA PETICION OPEN SSL PRIVATE SOLO ENCRYPTAR HASTA 117 CARACTERES
            $newEnc = []; // Nueva cadena de encriptacion
            foreach (str_split($arrayToXml, 117) as $partXml) {
                if (!openssl_private_encrypt($partXml, $enc, $this->privateKey)) {
                    throw new Exception('No se ha podiddo realizar la encriptacion de los datos con la clave privada');
                }
                // $newEnc[]['cadenaXml'] = base64_encode($enc);
                $newEnc[] = base64_encode($enc);
            }
            // Defiminos los parametros que se enviaran al cliente SOAP
            $params = [
                'identificador' => $this->idUser,
                'cadenaXML' => $newEnc
            ];
            // CONECTANDO CON WDSL
            $client = new \SoapClient($this->urlSoapClient);
            // EJECUTAMOS LA CONSULTA CON EL SERVICIO
            $respFormIngreso = $client->__soapCall('registroFormIngreso', [$params]);
            if (!$respFormIngreso) {
                throw new Exception('No se ha podido encontrar la funcion registroFormIngreso');
            }
            // CUSTOMIZAMOS EL RESULTADO DE SALIDA
            // Verificamos si resopnse es array
            if (!is_array($respFormIngreso->return)) {
                $respFormIngreso->return = [$respFormIngreso->return];
            }
            $response = ''; // Respuesta en formato XML
            // Iteramos la respuesta y concatenamos los resultados XML
            foreach ($respFormIngreso->return as $rc) {
                if (!openssl_public_decrypt(base64_decode($rc), $dec, $this->publicKey)) {
                    throw new Exception('No se ha podido desencriptar el resultado de la llamada');
                }
                // Concatenamos las respuestas XML
                $response .= $dec;
            }
            // CONVERTIMOS LA RESPUESTA XML EN ARRAY ITERABLE
            $objectXML = simplexml_load_string($response);
            $responseArray = (object) json_decode(json_encode($objectXML), true);
            // VERIFICAMOS LOS CODIGOS DE ERROR
            if (in_array($responseArray->resultado['codError'], ['1', '2', '3'])) {
                // Se ha generado un error
                throw new Exception("COD: " . $responseArray->resultado['codError'] . " -> " . $responseArray->resultado['descError']);
            }
            // RETORNAMOS LOS DATOS VERIFICADOS
            return response()->json([
                "response" => true,
                "message" => $responseArray->resultado
            ]);

        } catch (\Exception $e) {
            return response()->json([
                "response" => false,
                "message" => $e->getMessage()
            ]);
        }
    }

    /**
     * Reglas de validacion de las entradas input
     * @param $input
     * @return array
     */
    private function validatorRegister($input) {
        // parseamos a tipo objecto
        $errors = [];
        $rules = [
            'tipoOperacion' => ["required", Rule::in(['0', '1'])],
            //'fechaEnvio' => 'required|date',
            'resolucionAnterior' => 'max:15',
            'datosUsuario' => 'required',
            'datosIncorporacion' => 'required',
            'datosgenerales' => 'required',
            'instalacionesDepositos' => 'required',
            'insumosRepuestos' => 'required',
            'productosMercancias' => 'required',
            'productoInsumo' => 'required'
        ];

        // VALIDAMOS EL FORMULARIO DE ENTRADA SEGUN DOCUMENTACION ADJUNTA PDF
        $validator = Validator::make((array) $input, $rules);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = $validator->errors()->first($val);
            }
        }
        // VALIDANDO DATOS DE USUARIO
        $validator = Validator::make($input->datosUsuario, [
            "apellidoPaterno" => "required|max:20",
            "apellidoMaterno" => "max:20",
            "nombre" => "required|max:25",
            "correoElectronico" => "required|email|max:50",
            "tipoDocumento" => ["required", Rule::in(['CI', 'PAS', 'NIT'])],
            "nroDocumento" => "required|max:15",
            "lugarExpedicion" => "max:3",
            "telefono" => "max:15",
            "numeroMovil" => "required|max:15"
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'DATOS USUARIO: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO DATOS DE INCORPORACION
        $validator = Validator::make($input->datosIncorporacion, [
            "nroFormSolicitud" => "required|max:20",
            "fechaSolicitud" => "required|date_format:d/m/Y",
            "informe1" => "required|max:30",
            "fechaInforme1" => "required|date_format:d/m/Y",
            "informe2" => "max:30",
            "fechaInforme2" => "date_format:d/m/Y",
            "nroResolucion" => "required|max:15",
            "gestionResolucion" => "required|max:4",
            "fechaResolucion" => "required|date_format:d/m/Y",
            "tipoRitex" => ["required", Rule::in(['T', 'R'])]
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'DATOS DE INCORPORACIÓN: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO DATOS GENERALES
        $validator = Validator::make($input->datosgenerales, [
            "nit" => "required|max:15",
            "representanteLegal" => "required|max:50",
            "nroTestimonioPoder" => "required|max:20",
            "actividad" => "required|max:3000"
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'DATOS GENERALES: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO INSTALACION DEPOSITO
        $validator = Validator::make($input->instalacionesDepositos, [
            "instalacionDeposito.*.direccion" => "required|max:75",
            "instalacionDeposito.*.tipo" => ["required", Rule::in(['1', '2', '3'])],
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'INSTALACION DEPOSITO: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO INSUMOS RESPUESTOS
        $validator = Validator::make($input->insumosRepuestos, [
            "insumoRepuesto.*.codigo" => "required|max:4",
            "insumoRepuesto.*.partidaArancelaria" => "required|max:11",
            "insumoRepuesto.*.descripcion" => "required|max:100",
            "insumoRepuesto.*.unidadMedida" => "required|max:3"
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'INSUMOS REPUESTOS: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO PRODUCTOS MERCANCIAS
        $validator = Validator::make($input->productosMercancias, [
            "productoMercancia.*.codigo" => "required|max:4",
            "productoMercancia.*.partidaArancelaria" => "required|max:11",
            "productoMercancia.*.descripcion" => "required|max:100",
            "productoMercancia.*.unidadMedida" => "required|max:3"
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'PRODUCTOS MERCANCIAS: ' . $validator->errors()->first($val);
            }
        }

        // VALIDANDO PRODUCTOS INSUMO
        $validator = Validator::make($input->productoInsumo, [
            "coeficientes.*.producto" => "required|max:4",
            "coeficientes.*.insumo" => "required|max:11",
            "coeficientes.*.coeficienteTecnico" => "required|max:15",
            "coeficientes.*.sobrantes" => "required|max:12",
            "coeficientes.*.desperdicio" => "required|max:12"
        ]);
        if ($validator->fails()) {
            foreach (array_keys($validator->errors()->toArray()) as $val) {
                $errors[] = 'PRODUCTOS MERCANCIAS: ' . $validator->errors()->first($val);
            }
        }
        return $errors;
    }

    /**
     * Limpiamos los nullos de los campos no oblicgatorios y realizamos algunas adecuaciones
     * @param $input
     * @return mixed
     */
    private function clearInput($input) {
        $input->fechaEnvio = date("dmYHis", strtotime($input->fechaEnvio));
        $input->resolucionAnterior = $input->resolucionAnterior ? $input->resolucionAnterior : "";
        $input->datosUsuario['apellidoMaterno'] = $input->datosUsuario['apellidoMaterno'] ? $input->datosUsuario['apellidoMaterno'] : "";
        $input->datosUsuario['lugarExpedicion'] = $input->datosUsuario['lugarExpedicion'] ? $input->datosUsuario['lugarExpedicion'] : "";
        $input->datosUsuario['telefono'] = $input->datosUsuario['telefono'] ? $input->datosUsuario['telefono'] : "";
        $input->datosIncorporacion['informe2'] = $input->datosIncorporacion['informe2'] ? $input->datosIncorporacion['informe2'] : "";
        $input->datosIncorporacion['fechaInforme2'] = $input->datosIncorporacion['fechaInforme2'] ? $input->datosIncorporacion['fechaInforme2'] : "";
        return $input;
    }
}
