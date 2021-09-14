<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\MD_FSE004;
use App\Proceso;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CT_FSE004 extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $estados = (DB :: select( DB :: raw ("CALL P_LIS_SIS_PARAMETROS_DETALLE(1)")));
        $id = Auth::id();
        $modulos = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,1)")));
        $modulos2 = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,2)")));
        $modulos3 = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,3)")));
        $procesos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO()")));
        return view('configuracion.VB_FSE004')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados)->with('procesos', $procesos);
    }

    public function listarProcesosEscuelas(Request $request){
      $txtprocesobuscar=$request->txtprocesobuscar;
      $parametros = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO_ESCUELA($txtprocesobuscar)")));
      return response()->json(['data' => $parametros]);
    } 

    public function listarProcesos(Request $request){
      $parametros = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO")));
      return response()->json(['data' => $parametros]);
    } 

    public function listarEscuelas(Request $request){
      $escuelas = (DB :: select( DB :: raw ("CALL P_LIS_SGA_ESCUELA")));
      return response()->json(['data' => $escuelas]);
    } 

    public function actualizarProcesoEscuela(Request $request){   
        $txtcodigoprocesoescuela=$request->txtcodigoprocesoescuela;     
        $txtcodigoproceso=$request->txtcodigoproceso;
        $txtcodigoescuela=$request->txtcodigoescuela;
        $txtcodigosemestre=$request->txtcodigosemestre;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_ACT_FSE_PROCESO_ESCUELA($txtcodigoprocesoescuela,$txtcodigosemestre,$txtcodigoproceso,$txtcodigoescuela,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = 'Se Actualizo correctamente.';
        return response()->json(['success' => true,'message' => $msg]);

    }

    public function insertarProcesoEscuela(Request $request){
        $txtcodigoproceso=$request->txtcodigoproceso;
        $txtcodigoescuela=$request->txtcodigoescuela;
        $txtcodigosemestre=$request->txtcodigosemestre;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();

        $arrayVAL=(DB :: select( "call P_VAL_EXI_FSE_PROCESO_ESCUELA($txtcodigoproceso,$txtcodigoescuela)"));

        $n_registroVAL='';
        foreach($arrayVAL as $obj2){
            $n_registroVAL = $obj2->N_REGISTRO;
        }

        if ($n_registroVAL==0) {
            DB :: statement("call P_INS_FSE_PROCESO_ESCUELA($txtcodigoproceso,$txtcodigoescuela,$txtcodigosemestre,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
            $msg = 'Se registro correctamente.';
            return response()->json(['success' => true,'message' => $msg]);
        }else{
            $msg = 'Ya existe esta escuela en este proceso.';
            return response()->json(['success' => false,'message' => $msg]);
        }      
    }

     public function eliminarProcesoEscuela(Request $request){ 
        $txtcodigoprocesoescuelaE=$request->txtcodigoprocesoescuelaE;     
        $txtcodigoprocesoE=$request->txtcodigoprocesoE;     
        $txtcodigosemestreE=$request->txtcodigosemestreE;     
        $txtcodigoescuelaE=$request->txtcodigoescuelaE;     
        $USUARIO = Auth::id();
        DB :: statement("call P_ELI_FSE_PROCESO_ESCUELA($txtcodigoprocesoescuelaE,$txtcodigoprocesoE,$txtcodigoescuelaE,$txtcodigosemestreE,'$USUARIO')");
        $msg = 'Se elimino correctamente.';
        return response()->json(['success' => true,'message' => $msg]);
    }    

}
