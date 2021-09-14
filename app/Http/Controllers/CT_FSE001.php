<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\MD_FSE001;
use App\Proceso;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CT_FSE001 extends Controller
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
        return view('configuracion.VB_FSE001')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados);
    }

    public function listarParametros(Request $request){
      $parametros = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS()")));
      return response()->json(['data' => $parametros]);
    } 

    public function actualizarParametros(Request $request){        
        $txtcodigo=$request->txtcodigo;
        $txtnombre=$request->txtnombre;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_ACT_FSE_PARAMETROS($txtcodigo,'$txtnombre','$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = $request->txtcodigo;
        return response()->json(['success' => false,'message' => $msg]);

    }

    public function insertarParametros(Request $request){
        $txtnombre=$request->txtnombre;
        $txtfechainicio=$request->txtfechainicio;
        $txtfechafin=$request->txtfechafin;
        $txtestado=$request->txtestado;
        $USUARIO = Auth::id();
        DB :: statement("call P_INS_FSE_PARAMETOS('$txtnombre','$txtfechainicio','$txtfechafin',$txtestado,'$USUARIO')");
        $msg = 'Se registro correctamente el modulo ';
        return response()->json(['success' => true,'message' => $msg]);

    }

     public function eliminarParametros(Request $request){ 
        $txtcodigo=$request->txtcodigo;     
        $USUARIO = Auth::id();
        DB :: statement("call P_ELI_FSE_PARAMETROS($txtcodigo,'$USUARIO')");
        $msg = 'Se elimino correctamente el sistema ';
        return response()->json(['success' => true,'message' => $msg]);
    }    

}
