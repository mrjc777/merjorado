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
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
     * Funcion que se encarga de listar todas las solicitudes generadas
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
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data']
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

/**
     * Funcion que se encarga de cargar el PDF de Previsualizacion
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
            $sol = [
                "url" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName,
                "solicitud_pk" => $response['data']
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

    /**
     * Funcion para formato de fecha
     */
    public function formatFecha($fecha){
        $arrayMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $arrayFecha = explode('-', $fecha);
        return (int)$arrayFecha[2].' de '.$arrayMeses[(int)$arrayFecha[1] - 1].' de '.$arrayFecha[0];
    }
}
