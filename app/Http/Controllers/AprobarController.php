<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Aprobar;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\App;
use Barryvdh\DomPDF\Facade as PDF;

class AprobarController extends Controller
{
    /**
     * Contrcutor,
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            //archivo informe
            $file_64 = $data['informe_archivo64'];
            $fileName = date('YmdHis').'.pdf';
            Storage::disk('informe')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_informe'] = 'http://'.$dominio.'/storage/archivos_ritex/informes/'.$fileName;
            //fin informe
            //archivo resolucion
            $file_64 = $data['resolucion_archivo64'];
            $fileName = date('YmdHis').'.pdf';
            Storage::disk('resolucion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo_resolucion'] = 'http://'.$dominio.'/storage/archivos_ritex/resoluciones/'.$fileName;
            //fin resolucion

            $auth = getAuthh(request()->path());
            $resp = Aprobar::abm($auth, 'CREAR_RESOLUCION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * FUNCIONES PARA CARGADO DE ARCHIVOS RESOLUCION
     */

    public function reporteResolucion(Request $request)  
    {
       try{
            $data = $request->all();
            //$fechaImpresion = 'La Paz, '.date('d').' de '.$this->fecha().' de '.date('Y');
            $fechaImpresion = 'La Paz, '.date('d');
            $pdf = PDF::loadView('reportes.resolucionincorporacion');
            //$pdf->setPaper('LETTER','portrait');
            $reporte = $pdf->output();
            $fileName = 'resolucion'.date('YmdHis').'.pdf';
            Storage::disk('temporales')->put($fileName, $reporte);
            
            $dominio = $request->getHost();
            $resp = [
                "type" => "success",
                "message" => "Descarga de Template de la resolucion",
                "data" => "http://".$dominio."/storage/archivos_ritex/templates/".$fileName
            ];
            return response()->make(json_encode($resp))->header('Content-Type', 'application/json');
       }catch (\Exception $e) {
        return response()->json(errorException($e));
       }
    }
}
