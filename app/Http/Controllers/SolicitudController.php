<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
use App\Solicitud;

class SolicitudController extends Controller
{
    /**
     * Constrcutor,
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    /**
     * Listar solicitudes de incorporacion con codigos generados, solo para el usuario tecnico ritex
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::list($auth, 'LISTAR_SOLICITUDES_INCORPORACION', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Listar solicitudes de modificacion con codigos generados, solo para el usuario tecnico ritex
     */
    public function listarSolicitudesTecnico()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::listarSolicitudesModificacionesTecnico($auth, 'LISTAR_SOLICITUDES_MODIFICACION', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Listar solicitudes de ampliacion de plazo con codigos generados, solo para el usuario tecnico ritex
     */
    public function listarSolicitudesAmpliacionTecnico()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::listarSolicitudesAmpliacionTecnico($auth, 'LISTAR_SOLICITUDES_AMPLIACION_PLAZO', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * Listar solicitudes de retiro voluntario con codigos generados, solo para el usuario tecnico ritex
     */
    public function listarSolicitudesRetiroTecnico()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::listarSolicitudesRetiroTecnico($auth, 'LISTAR_SOLICITUDES_RETIRO_VOLUNTARIO', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * CREAR UNA SOLICITUD DE INCORPORACION POR EL ROL EMPRESA
     */
    public function store(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abm($auth, 'CREAR_SOLICITUD', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }


    /**
     * ELIMINAR UNA SOLICITUD DE INCORPORACION POR PARTE DEL ROL TECNICO
     */
    public function destroy($id)
    {
        try {
            $input = [
                'idsol' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abm($auth, 'ELIMINAR_SOLICITUD', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * ELIMINAR UNA SOLICITUD DE MODIFICACION POR PARTE DEL ROL TECNICO
     */
    public function eliminarSolicitudModificacion($id)
    {
        try {
            $input = [
                'idsol' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abmMod($auth, 'ELIMINAR_SOLICITUD', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * ELIMINAR UNA SOLICITUD DE AMPLIACION DE PLAZO POR PARTE DEL ROL TECNICO
     */
    public function eliminarSolicitudAmpliacion($id)
    {
        try {
            $input = [
                'idsol' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abmAmpliacionPlazoTecnico($auth, 'ELIMINAR_SOLICITUD_AMPLIACION', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * ELIMINAR UNA SOLICITUD DE RETIRO VOLUNTARIO POR PARTE DEL ROL TECNICO
     */
    public function eliminarSolicitudRetiro($id)
    {
        try {
            $input = [
                'idsol' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abmRetiroVoluntarioTecnico($auth, 'ELIMINAR_SOLICITUD_RETIRO', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de listar todas las solicitudes de incorporacion generadas
     * con codigo por parte de la empresa.
     */
    public function listarSolicitudesGeneradasEmpresa()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::getSolicitudesGeneradas($auth, 'LISTAR_SOLICITUDES_GENERADAS', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * Funcion que se encarga de listar todas las solicitudes de modificacion generadas
     * con codigo por parte de la empresa.
     */
    public function listarSolicitudesModificacionGeneradasEmpresa()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::getSolicitudesModificacionGeneradas($auth, 'LISTAR_SOLICITUDES_MODIFICACIONES_GENERADAS', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de listar todas las solicitudes de ampliacion de plazo generadas
     * con codigo por parte de la empresa.
     */
    public function listarSolicitudesAmpliacionGeneradasEmpresa()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::getSolicitudesAmpliacionGeneradas($auth, 'LISTAR_SOLICITUDES_AMPLIACION_GENERADAS', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * Funcion que se encarga de listar todas las solicitudes de retiro voluntario generadas
     * con codigo por parte de la empresa.
     */
    public function listarSolicitudesRetiroGeneradasEmpresa()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::getSolicitudesRetiroGeneradas($auth, 'LISTAR_SOLICITUDES_RETIRO_GENERADAS', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCIONES PARA LA SOLICITUD DE MODIFICACIONES
      * LISTAR SOLICITUDES DE MODIFICACION, SOLO PARA EL USUARIO TECNICO
    */
    public function listar()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::listMod($auth, 'LISTAR_SOLICITUDES_MODIFICACION', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
      * ALTAS, BAJAS Y MODIFICACIONES DE SOLICITUD DE MODIFICACION
      * CREAR UNA SOLICITUD DE MODIFICACION POR EL ROL EMPRESA
      */
    public function crearSolMod(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abmMod($auth, 'CREAR_SOLICITUD_MODIFICACION', $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de Previsualizacion
     * de la Solicitud (Incorporacion), por parte de la empresa
     */
    public function pdfPrevisualizacion(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            //$resp = Solicitud::previsualizacionPDF($auth, 'DATOS_PRINT_INC', $data);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "-";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitud', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitud' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud sin codigo generado",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de la Solicitud (Incorporacion),
     * con CODIGO por parte de la empresa
     */
    public function pdfSolicitudConCodigo(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Solicitud::pdfSolicitudConCodigo($auth, 'CREAR_SOLICITUD', $data);
            $response = json_decode($resp, true);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "SRT Nro. 0001/2020";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitud', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitud' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $archivo = file_get_contents('C:\xampp\htdocs\ritex\public\storage\archivos_ritex\temporales/'. $fileName);
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data'],
                "archivo_base64" => base64_encode($archivo)
            ];
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud de incorporacion con Codigo",
                "data" => $sol
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /*** Funcion que se encarga de cargar el PDF de Previsualizacion
     * de la Solicitud (Modificacion), por parte de la empresa
     */
    public function pdfPrevisualizacionModificacion(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            //$resp = Solicitud::previsualizacionPDF($auth, 'DATOS_PRINT_INC', $data);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "-";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitud', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitud' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud sin codigo generado",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de la Solicitud (Modificacion),
     * con CODIGO por parte de la empresa
     */
    public function pdfSolicitudConCodigoModificacion(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Solicitud::pdfSolicitudConCodigoMod($auth, 'CREAR_SOLICITUD_MODIFICACION', $data);
            $response = json_decode($resp, true);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "SRT Nro. 0002/2020";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitudmodificacion', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitud' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $archivo = file_get_contents('C:\xampp\htdocs\ritex\public\storage\archivos_ritex\temporales/'. $fileName);
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data'],
                "archivo_base64" => base64_encode($archivo)
            ];
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud de modificacion con Codigo",
                "data" => $sol
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de Previsualizacion
     * de la Solicitud (Ampliacion de Plazo), por parte de la empresa
     */
    public function pdfPrevisualizacionAmpliacion(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            //$resp = Solicitud::previsualizacionPDF($auth, 'DATOS_PRINT_INC', $data);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "-";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitudampliacion', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitudampliacion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud sin codigo generado",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de la Solicitud (Ampliacion de plazo),
     * con CODIGO por parte de la empresa
     */
    public function pdfSolicitudConCodigoAmpliacion(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Solicitud::pdfSolicitudConCodigoAmpliacion($auth, 'CREAR_SOLICITUD_AMPLIACION', $data);
            $response = json_decode($resp, true);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "SRT Nro. 0003/2020";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitudampliacion', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitudampliacion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $archivo = file_get_contents('C:\xampp\htdocs\ritex\public\storage\archivos_ritex\temporales/'. $fileName);
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data'],
                "archivo_base64" => base64_encode($archivo)
            ];
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud de ampliacion de plazo con Codigo",
                "data" => $sol
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de Previsualizacion
     * de la Solicitud (Retiro Voluntario), por parte de la empresa
     */
    public function pdfPrevisualizacionRetiro(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            //$resp = Solicitud::previsualizacionPDF($auth, 'DATOS_PRINT_INC', $data);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "-";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitudretiro', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitudretiro' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud sin codigo generado",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion que se encarga de cargar el PDF de la Solicitud (Retiro Voluntario),
     * con CODIGO por parte de la empresa
     */
    public function pdfSolicitudConCodigoRetiro(Request $request){
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Solicitud::pdfSolicitudConCodigoRetiro($auth, 'CREAR_SOLICITUD_RETIRO', $data);
            $response = json_decode($resp, true);

            $data['solicitud_fecha'] = $this->formatFecha(date('Y-m-d'));
            $data['codigo_solicitud'] = "SRT Nro. 0003/2020";
            //$pdf = PDF::loadView('reportes.solicitud', compact('data', 'resp'));
            $pdf = PDF::loadView('reportes.solicitudretiro', compact('data'));
            $reporte = $pdf->output();
            $fileName = 'solicitudretiro' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $archivo = file_get_contents('C:\xampp\htdocs\ritex\public\storage\archivos_ritex\temporales/'. $fileName);
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data'],
                "archivo_base64" => base64_encode($archivo)
            ];
            $resp = [
                "type" => "success",
                "message" => "Archivo de solicitud de retiro voluntario con Codigo",
                "data" => $sol
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Funcion para realizar la observacion por parte usuario tecnico
     */
    public function observar(Request $request)
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Solicitud::abm($auth, 'OBSERVAR', $data = $request->input());
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }


    /**
     * Funcion para formato de fecha
     */
    public function formatFecha($fecha){
        $arrayMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $arrayFecha = explode('-', $fecha);
        return (int)$arrayFecha[2].' de '.$arrayMeses[(int)$arrayFecha[1] - 1].' de '.$arrayFecha[0];
    }
}
