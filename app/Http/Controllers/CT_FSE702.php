<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;
use DB;

class CT_FSE702 extends Controller
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

        return view('reportes.VB_FSE702')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados)->with('procesos', $procesos);
    }

    public function listarfichas(Request $request){
        $proceso=$request->txtproceso;   
        $fichas = (DB :: select( DB :: raw ("CALL P_LIS_FSE_FICHA($proceso)")));
        return response()->json(['data' => $fichas]);
    }

}
