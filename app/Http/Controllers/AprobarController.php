<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aprobar;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\App;
use Barryvdh\DomPDF\Facade as PDF;

use function GuzzleHttp\json_decode;

class AprobarController extends Controller
{
    /**
     * Contrcutor,
     */
    public function __contruct()
    {
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
            $auth = getAuthh(request()->path());
            $resp = Aprobar::list($auth, 'LISTAR_RESOLUCIONES', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }
    
    /**
     * Aprobacion de una solicitud de incorporacion por parte del rol tecnico VCI
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            //archivo informe
            $file_64 = $data['informe_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('informe')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_informe'] = 'http://' . $dominio . '/storage/archivos_ritex/informes/' . $fileName;
            //fin informe
            //archivo resolucion
            $file_64 = $data['resolucion_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('resolucion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_resolucion'] = 'http://' . $dominio . '/storage/archivos_ritex/resoluciones/' . $fileName;
            //fin resolucion

            $auth = getAuthh(request()->path());
            $resp = Aprobar::abm($auth, 'CREAR_RESOLUCION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            //
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Aprobacion de una solicitud de modificacion por parte del rol tecnico VCI
     */
    public function aprobarSolicitudModificacion(Request $request)
    {
        try {
            $data = $request->all();
            //archivo informe
            $file_64 = $data['informe_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('informe')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_informe'] = 'http://' . $dominio . '/storage/archivos_ritex/informes/' . $fileName;
            //fin informe
            //archivo resolucion
            $file_64 = $data['resolucion_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('resolucion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_resolucion'] = 'http://' . $dominio . '/storage/archivos_ritex/resoluciones/' . $fileName;
            //fin resolucion

            $auth = getAuthh(request()->path());
            $resp = Aprobar::abmResolucionModificacion($auth, 'CREAR_RESOLUCION_ADMINISTRATIVA_MODIFICACION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            //
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Aprobacion de una solicitud de ampliacion de plazo por parte del rol tecnico VCI
     */
    public function aprobarSolicitudAmpliacion(Request $request)
    {
        try {
            $data = $request->all();
            //archivo informe
            $file_64 = $data['informe_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('informe')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_informe'] = 'http://' . $dominio . '/storage/archivos_ritex/informes/' . $fileName;
            //fin informe
            //archivo resolucion
            $file_64 = $data['resolucion_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('resolucion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_resolucion'] = 'http://' . $dominio . '/storage/archivos_ritex/resoluciones/' . $fileName;
            //fin resolucion

            $auth = getAuthh(request()->path());
            $resp = Aprobar::abmResolucionAmpliacion($auth, 'CREAR_RESOLUCION_ADMINISTRATIVA_AMPLIACION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            //
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Aprobacion de una solicitud de retiro voluntario por parte del rol tecnico VCI
     */
    public function aprobarSolicitudRetiro(Request $request)
    {
        try {
            $data = $request->all();
            //archivo informe
            $file_64 = $data['informe_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('informe')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_informe'] = 'http://' . $dominio . '/storage/archivos_ritex/informes/' . $fileName;
            //fin informe
            //archivo resolucion
            $file_64 = $data['resolucion_archivo64'];
            $fileName = date('YmdHis') . '.pdf';
            Storage::disk('resolucion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_resolucion'] = 'http://' . $dominio . '/storage/archivos_ritex/resoluciones/' . $fileName;
            //fin resolucion

            $auth = getAuthh(request()->path());
            $resp = Aprobar::abmResolucionRetiro($auth, 'CREAR_RESOLUCION_ADMINISTRATIVA_RETIRO', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            //
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCIONES PARA CARGADO DE ARCHIVOS RESOLUCION PARA UNA SOLICITUD DE INCORPORACION
     */

    public function reporteResolucion(Request $request)
    {
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Aprobar::printIncRA($auth, 'DATOS_PRINT_INC', $data);
          
            $data['informe_fecha'] = $this->formatFecha($data['informe_fecha']);
            $data['resolucion_fecha'] = $this->formatFecha($data['resolucion_fecha']);
            $pdf = PDF::loadView('reportes.resolucionincorporacion', compact('data', 'resp'));
            $reporte = $pdf->output();
            $fileName = 'resolucion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Descarga de Template de la resolucion",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * FUNCIONES PARA CARGADO DE ARCHIVOS RESOLUCION PARA UNA SOLICITUD DE MODIFICACION
     */

    public function reporteResolucionModificacion(Request $request)
    {
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Aprobar::printModificacionRA($auth, 'DATOS_PRINT_MOD', $data);
          
            $data['informe_fecha'] = $this->formatFecha($data['informe_fecha']);
            $data['resolucion_fecha'] = $this->formatFecha($data['resolucion_fecha']);
            $pdf = PDF::loadView('reportes.resolucionmodificacion', compact('data', 'resp'));
            $reporte = $pdf->output();
            $fileName = 'resolucion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Descarga de Template de la resolucion",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * FUNCIONES PARA CARGADO DE ARCHIVOS RESOLUCION PARA UNA SOLICITUD DE AMPLIACION DE PLAZO
     */

    public function reporteResolucionAmpliacion(Request $request)
    {
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Aprobar::printAmpliacionRA($auth, 'DATOS_PRINT_AMP', $data);
          
            $data['informe_fecha'] = $this->formatFecha($data['informe_fecha']);
            $data['resolucion_fecha'] = $this->formatFecha($data['resolucion_fecha']);
            $pdf = PDF::loadView('reportes.resolucionampliacion', compact('data', 'resp'));
            $reporte = $pdf->output();
            $fileName = 'resolucion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Descarga de Template de la resolucion",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

     /**
     * FUNCIONES PARA CARGADO DE ARCHIVOS RESOLUCION PARA UNA SOLICITUD DE RETIRO VOLUNTARIO
     */

    public function reporteResolucionRetiro(Request $request)
    {
        try {
            $data = $request->all();
            $auth = getAuthh(request()->path());
            $resp = Aprobar::printRetiroRA($auth, 'DATOS_PRINT_RVO', $data);
          
            $data['informe_fecha'] = $this->formatFecha($data['informe_fecha']);
            $data['resolucion_fecha'] = $this->formatFecha($data['resolucion_fecha']);
            $pdf = PDF::loadView('reportes.resolucionretiro', compact('data', 'resp'));
            $reporte = $pdf->output();
            $fileName = 'resolucion' . date('YmdHis') . '.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);

            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Descarga de Template de la resolucion",
                "data" => "http://" . $dominio . "/storage/archivos_ritex/temporales/" . $fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }


    public function formatFecha($fecha){
        $arrayMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $arrayFecha = explode('-', $fecha);
        return (int)$arrayFecha[2].' de '.$arrayMeses[(int)$arrayFecha[1] - 1].' de '.$arrayFecha[0];
    }




    /**
     * FUNCIONES PARA DATOS DE IMPRESION DE RESOLUCION ADMINISTRATIVA DE INCORPORACION
     * 
     */
    /**public function datosPrintRaInc()
    {
        try {
            $auth = getAuthh(request()->path());
            $resp = Aprobar::printIncRA($auth, 'DATOS_PRINT_INC', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }*/
}
