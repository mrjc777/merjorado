<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Archivo;
use Illuminate\Support\Facades\Storage;
use App\Solicitud;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            $file_64 = $data['archivo_base64'];
            $fileName = date('YmdHis').'.pdf';
            Storage::disk('solicitud_incorporacion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo'] = 'http://'.$dominio.'/storage/archivos_ritex/solicitud_incorporacion/'.$fileName;
            $auth = getAuthh(request()->path());;
            $resp = Archivo::solIncorporacion($auth, 'CARGAR_SOLICITUD_INC', $data);

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
     * FUNCIONES PARA EL CARGADO DE ARCHIVOS INFORME PERICIAL SOLICITUD DE INCORPORACION
     */

    /***
     * Controlador para cargar los archivos informe pericial y otros (Solicitud de Incorporacion)
     */
    public function setFile(Request $request) 
    {
        try {
            $data = $request->all();
            $file_64 = $data['archivo_base64'];
            $fileName = date('YmdHis').'.pdf';
            Storage::disk('solicitud_incorporacion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo'] = 'http://'.$dominio.'/storage/archivos_ritex/solicitud_incorporacion/'.$fileName;
            $auth = getAuthh(request()->path());;
            $resp = Archivo::archivoInfPericialInc($auth, 'SUBIR_ARCHIVO_INCORPORACION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /***
     * Controlador para listar los archivos informe pericial y otros (Solicitud de Incorporacion)
     */
    public function getFiles() {
        try {
            $auth = getAuthh(request()->path());;
            $resp = Archivo::listarInformes($auth, 'LISTAR_INFORMES_PERICIALES', []);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }

    /**
     * Controlador para eliminar logicamente los archivos informe pericial y otros (Solicitud de Incorporacion)
     */
      public function eliminarinformes($id)
      {
          try {
              $input = [
                  'idarch' => $id
              ];
              $auth = getAuthh(request()->path());
              $resp = Archivo::archivoInfPericialIncEliminar($auth, 'ELIMINAR_INFORME', $input);
              if (isset($resp->error)) {
                  return response()->json(msgErrorQuery($resp));
              }
              return response()->make($resp)->header('Content-Type', 'application/json');
          } catch (\Exception $e) {
              return response()->json(errorException($e));
          }
      }

    /**
    * FUNCIONES PARA EL CARGADO DE ARCHIVOS INFORME PERICIAL SOLICITUD DE MODIFICACION
    */

    /***
     * Controlador para cargar los archivos informe pericial y otros (Solicitud de Modificacion)
     */
    public function setFileMod(Request $request) 
    {
        try {
            $data = $request->all();
            $file_64 = $data['archivo_base64'];
            $fileName = date('YmdHis').'.pdf';
            Storage::disk('solicitud_modificacion')->put($fileName, base64_decode($file_64, true));
            $dominio = $request->getHost();
            $data['path_completo'] = 'http://'.$dominio.'/storage/archivos_ritex/solicitud_modificacion/'.$fileName;
            $auth = getAuthh(request()->path());;
            $resp = Archivo::archivoInfPericialMod($auth, 'SUBIR_ARCHIVO_MODIFICACION', $data);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }   
    }

    /**
     * Controlador para eliminar logicamente los archivos informe pericial y otros (Solicitud de Modificacion)
     */
    public function eliminarInformesModificacion($id)
    {
        try {
            $input = [
                'idarch' => $id
            ];
            $auth = getAuthh(request()->path());
            $resp = Archivo::archivoInfPericialModEliminar($auth, 'ELIMINAR_INFORME', $input);
            if (isset($resp->error)) {
                return response()->json(msgErrorQuery($resp));
            }
            return response()->make($resp)->header('Content-Type', 'application/json');
        } catch (\Exception $e) {
            return response()->json(errorException($e));
        }
    }


}