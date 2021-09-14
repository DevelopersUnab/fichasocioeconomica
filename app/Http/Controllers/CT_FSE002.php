<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\MD_FSE002;
use App\Proceso;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CT_FSE002 extends Controller
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
        return view('configuracion.VB_FSE002')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados);
    }

    public function listarParametrosDetalle(Request $request){
      $txtcodigoparametro2=$request->txtcodigoparametro2;  
      if ($txtcodigoparametro2=='') {
          $txtcodigoparametro=0;
      } else {
          $txtcodigoparametro=$txtcodigoparametro2;
      }
      
      $parametros = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE($txtcodigoparametro)")));
      return response()->json(['data' => $parametros]);
    } 

    public function listarParametros(Request $request){
      $parametros = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS")));
      return response()->json(['data' => $parametros]);
    } 

    public function actualizarParametrosDetalle(Request $request){        
        $txtcodigoparametrodetalle=$request->txtcodigoparametrodetalle;
        $txtcodigoparametro=$request->txtcodigoparametro;
        $txtnombre=$request->txtnombre;
        $txtpuntuacion=$request->txtpuntuacion;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_ACT_FSE_PARAMETROS_DETALLE($txtcodigoparametrodetalle,$txtcodigoparametro,'$txtnombre',$txtpuntuacion,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = 'Se Actualizo correctamente.';
        return response()->json(['success' => true,'message' => $msg]);

    }

    public function insertarParametrosDetalle(Request $request){
        $txtcodigoparametro=$request->txtcodigoparametro;
        $txtnombre=$request->txtnombre;
        $txtpuntuacion=$request->txtpuntuacion;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_INS_FSE_PARAMETOS_DETALLE($txtcodigoparametro,'$txtnombre',$txtpuntuacion,'$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = 'Se registro correctamente.';
        return response()->json(['success' => true,'message' => $msg]);

    }

     public function eliminarParametrosDetalle(Request $request){ 
        $txtcodigoE=$request->txtcodigo;     
        $txtcodigoparametroE=$request->txtcodigoparametroE;
        $USUARIO = Auth::id();
        DB :: statement("call P_ELI_FSE_PARAMETROS_DETALLE($txtcodigoE,$txtcodigoparametroE,'$USUARIO')");
        $msg = 'Se elimino correctamente el sistema ';
        return response()->json(['success' => true,'message' => $msg]);
    }    

}
