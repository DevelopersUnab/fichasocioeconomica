<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\MD_FSE003;
use App\Proceso;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CT_FSE003 extends Controller
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
        $semestres = (DB :: select( DB :: raw ("CALL P_LIS_SGA_SEMESTRE")));
        return view('configuracion.VB_FSE003')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados)->with('semestres', $semestres);
    }

    public function listarProcesos(Request $request){
      $procesos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO()")));
      return response()->json(['data' => $procesos]);
    } 

    public function actualizarProceso(Request $request){    
        $txtcodigo=$request->txtcodigo;   
        $txtsemestre=$request->txtsemestre;
        $txtnombreanio=$request->txtnombreanio;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_ACT_FSE_PROCESO('$txtnombreanio',$txtcodigo,$txtsemestre,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = 'Se Actualizo correctamente.';
        return response()->json(['success' => true,'message' => $msg]);

    }

    public function insertarProceso(Request $request){
        $txtnombreanio=$request->txtnombreanio;
        $txtsemestre=$request->txtsemestre;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        //$txtestado=$request->txtestado;
        $txtestado=1;
        $USUARIO = Auth::id();

        $arrayVAL=(DB :: select( "call P_VAL_EXI_FSE_PROCESO($txtsemestre)"));

        $n_registroVAL='';
        foreach($arrayVAL as $obj2){
            $n_registroVAL = $obj2->N_REGISTRO;
        }

        $arrayProcesoActivo=(DB :: select( "call P_VAL_EXI_FSE_PROCESO_ACTIVO()"));

        $n_registroProcesoActivo='';
        foreach($arrayProcesoActivo as $obj2){
            $n_registroProcesoActivo = $obj2->N_REGISTRO;
        }

        if ($n_registroProcesoActivo==0) {
            if ($n_registroVAL==0) {
                DB :: statement("call P_INS_FSE_PROCESO('$txtnombreanio',$txtsemestre,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
                $msg = 'Se registro correctamente.';
                return response()->json(['success' => true,'message' => $msg]);
            } else {
                $msg = 'Ya existe este proceso registrado.';
                return response()->json(['success' => false,'message' => $msg]);
            } 
        } else {
           $msg = 'Existe un proceso activo debera finalizar para registar un nuevo proceso.';
                return response()->json(['success' => false,'message' => $msg]);
        }
    }

     public function eliminarProceso(Request $request){ 
        $txtcodigoE=$request->txtcodigo;     
        $txtcodigosemestreE=$request->txtcodigosemestreE;
        $USUARIO = Auth::id();
        DB :: statement("call P_ELI_FSE_PROCESO($txtcodigoE,$txtcodigosemestreE,'$USUARIO')");
        $msg = 'Se elimino correctamente.';
        return response()->json(['success' => true,'message' => $msg]);
    } 

    public function finalizarProceso(Request $request){ 
        $txtcodigoE=$request->txtcodigoE;     
        $USUARIO = Auth::id();
        DB :: statement("call P_ACT_FSE_PROCESO_FINALIZAR($txtcodigoE,'$USUARIO')");
        $msg = 'Se finalizo correctamente.';
        return response()->json(['success' => true,'message' => $msg]);
    }       

}
