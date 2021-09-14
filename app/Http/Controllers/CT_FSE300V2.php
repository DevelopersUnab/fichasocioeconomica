<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use DB;
use App\MD_FSE300;
use App\Proceso;
use App\User;
use Illuminate\Support\Facades\Auth;
use DateTime;

class CT_FSE300 extends Controller
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

        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($id)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteFicha=(DB :: select( "call P_VAL_EXI_FSE_FICHA($n_codigoalumno)"));
        $n_existeFicha='';
        foreach($arrayExisteFicha as $obj){
            $n_existeFicha = $obj->N_REGISTRO;
        }

        if ($n_existeFicha==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_FICHA($n_codigoalumno,0,$id)")));
        }
        

        $capitulos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(18)")));
        $facultades = (DB :: select( DB :: raw ("CALL P_LIS_SGA_FACULTAD()")));
        $escuelas = (DB :: select( DB :: raw ("CALL P_LIS_SGA_ESCUELA()")));
        $ciclos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(19)")));
        $estadocivil = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(20)")));
        $idiomasmaterna = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(21)")));
        $tipocolegios = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(2)")));
        $estadoFicha = (DB :: select( DB :: raw ("CALL P_OBT_FSE_FICHA_ESTADO($n_codigoalumno)")));
        $n_estadoFicha='';
        foreach($estadoFicha as $obj){
            $n_estadoFicha = $obj->ESTADO;
        }
        $lugarProcedencia = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(1)")));
        $condicionVivienda = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(5)")));
        $materialParedes = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(6)")));
        $materialTechos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(8)")));
        $materialPiso = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(9)")));
        $servicioLuz = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(10)")));
        $servicioAgua = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(11)")));
        $servicioDesague = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(12)")));
        $personasDomicilio = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(22)")));
        $ambientesVivienda = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(23)")));
        $dormitoriosVivienda = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(24)")));
        $personasDormitorio = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(13)")));
        $hogarTiene = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(25)")));
        $servicioComplementario = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(26)")));
        $ingieresalimentos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(27)")));
        $religionPertenece = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(28)")));
        $medioTransporte = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(29)")));
        $beneficiarioPrograma = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(30)")));
        $condicionEstudiante = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(31)")));        
        $situacionFamiliar = (DB :: select( DB :: raw ("CALL P_LIS_FSE_SITUACION_FAMILIAR($n_codigoalumno)")));
        $parentesco = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(32)")));
        $sexo = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(33)")));
        $estadocivils = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(20)")));
        $gradoInstruccionJefe = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(7)")));
        $ocupacion = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(34)")));

        

        return view('proceso.VB_FSE300')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados)->with('procesos', $procesos)->with('capitulos', $capitulos)->with('facultades', $facultades)->with('escuelas', $escuelas)->with('ciclos', $ciclos)->with('estadocivil', $estadocivil)->with('idiomasmaterna', $idiomasmaterna)->with('tipocolegios', $tipocolegios)->with('estadoFicha', $n_estadoFicha)->with('lugarProcedencia', $lugarProcedencia)->with('condicionVivienda', $condicionVivienda)->with('materialParedes', $materialParedes)->with('materialTechos', $materialTechos)->with('materialPiso', $materialPiso)->with('servicioLuz', $servicioLuz)->with('servicioAgua', $servicioAgua)->with('servicioDesague', $servicioDesague)->with('personasDomicilio', $personasDomicilio)->with('ambientesVivienda', $ambientesVivienda)->with('dormitoriosVivienda', $dormitoriosVivienda)->with('personasDormitorio', $personasDormitorio)->with('hogarTiene', $hogarTiene)->with('servicioComplementario', $servicioComplementario)->with('ingieresalimentos', $ingieresalimentos)->with('religionPertenece', $religionPertenece)->with('medioTransporte', $medioTransporte)->with('beneficiarioPrograma', $beneficiarioPrograma)->with('condicionEstudiante', $condicionEstudiante)->with('situacionFamiliar', $situacionFamiliar)->with('parentesco', $parentesco)->with('sexo', $sexo)->with('estadocivils', $estadocivils)->with('gradoInstruccionJefe', $gradoInstruccionJefe)->with('ocupacion', $ocupacion);
    }

    public function listarFamiliares(){
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }
        $situacionFamiliar = (DB :: select( DB :: raw ("CALL P_LIS_FSE_SITUACION_FAMILIAR($n_codigoalumno)")));
        return response()->json(['data' => $situacionFamiliar]);
    }

    public function paso1(Request $request){
        $txtedad=$request->txtedad;
        $txtciclo=$request->txtciclo;
        $txtanioingreso=$request->txtanioingreso;
        $txtcorreoelectronico=$request->txtcorreoelectronico;
        $txtcelular=$request->txtcelular;
        $txtfijo=$request->txttelefono;
        $txtfechanacimiento=$request->txtfechanacimiento;
        $txtubigeo='010202';        
        $txtlugarnacimiento=$request->txtlugarnacimiento;
        $txttelefonoemergencia=$request->txttelefonoemergencia;
        $txttutorresponsable=$request->txttutorresponsable;
        $txtsexo=$request->txtsexo;
        $txtestadocivil=$request->txtestadocivil;
        $txtidiomamaterna=$request->txtidiomamaterna;
        $txtidiomamaternaespecificar=$request->txtidiomamaternaespecificar;
        $txtinstitucioneducativa=$request->txtinstitucioneducativa;
        $txttipocolegio=$request->txttipocolegio;
        $txttipocolegioespecificar=$request->txttipocolegioespecificar;
        $txtestado = 1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteDatosPersonales=(DB :: select( "call P_VAL_EXI_FSE_DATOSPERSONALES($n_codigoalumno)"));
        $n_existeDatosPersonales='';
        foreach($arrayExisteDatosPersonales as $obj){
            $n_existeDatosPersonales = $obj->N_REGISTRO;
        }

        if ($n_existeDatosPersonales==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,1,$USUARIO)")));
            DB :: statement("call P_INS_FSE_DATOSPERSONALES($n_codigoalumno,$txtedad,$txtciclo,'$txtanioingreso','$txtcorreoelectronico','$txtcelular','$txtfijo','$txtfechanacimiento','$txtubigeo','$txtlugarnacimiento','$txttelefonoemergencia','$txttutorresponsable',$txtestadocivil,$txtidiomamaterna,'$txtidiomamaternaespecificar','$txtinstitucioneducativa',$txttipocolegio,'$txttipocolegioespecificar',$txtestado,'$USUARIO')");
            $msg = 'Datos Guardados.';
        } else {
            DB :: statement("call P_ACT_FSE_DATOSPERSONALES($n_codigoalumno,$txtedad,$txtciclo,'$txtanioingreso','$txtcorreoelectronico','$txtcelular','$txtfijo','$txtfechanacimiento','$txtubigeo','$txtlugarnacimiento','$txttelefonoemergencia','$txttutorresponsable',$txtestadocivil,$txtidiomamaterna,'$txtidiomamaternaespecificar','$txtinstitucioneducativa',$txttipocolegio,'$txttipocolegioespecificar',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }
            
       
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso2(){
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }
        $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,2,$USUARIO)")));
    }

    public function paso3(){
        $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,3,$USUARIO)")));
    }

    public function paso6(Request $request){
        $txtingenierealimentos=$request->radioIA;
        $txtingenierealimentosespecificar=$request->txtingenierealimentosespecificar;
        $txtestado = 1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteAlimentacion=(DB :: select( "call P_VAL_EXI_FSE_ALIMENTACION($n_codigoalumno)"));
        $n_existeAlimntacion='';
        foreach($arrayExisteAlimentacion as $obj){
            $n_existeAlimntacion = $obj->N_REGISTRO;
        }

        if ($n_existeAlimntacion==0) {            
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_ALIMENTACION($n_codigoalumno,$txtingenierealimentos,'$txtingenierealimentosespecificar',$txtestado,$USUARIO)")));
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,6,$USUARIO)")));
            $msg = 'Datos Guardados.';
        }else{
            DB :: statement("call P_ACT_FSE_ALIMENTACION($n_codigoalumno,$txtingenierealimentos,'$txtingenierealimentosespecificar',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso7(Request $request){
        $txtreligion=$request->txtreligion;
        $txtespecificarreligion=$request->txtespecificarreligion;
        $txtpracticadisciplinadeportiva=$request->txtpracticadisciplinadeportiva;
        $txtpracticadisciplinaartistica=$request->txtpracticadisciplinaartistica;
        $txtratoslibres=$request->txtratoslibres;
        $txtestado = 1;
        $USUARIO = Auth::id();

        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteSocioCultural=(DB :: select( "call P_VAL_EXI_FSE_SOCIOCULTURAL_DEPORTIVO($n_codigoalumno)"));
        $n_existeSocioCultural='';    
        foreach($arrayExisteSocioCultural as $obj){
            $arrayExisteSocioCultural = $obj->N_REGISTRO;
        }

        if ($arrayExisteSocioCultural==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SOCIOCULTURAL_DEPORTIVO($n_codigoalumno,$txtreligion,'$txtespecificarreligion','$txtpracticadisciplinadeportiva','$txtpracticadisciplinaartistica','$txtratoslibres',$txtestado,$USUARIO)")));
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,7,$USUARIO)")));
            $msg = 'Datos Guardados.';
        }else {
            DB :: statement("call P_ACT_FSE_SOCIOCULTURAL_DEPORTIVO($n_codigoalumno,$txtreligion,'$txtespecificarreligion','$txtpracticadisciplinadeportiva','$txtpracticadisciplinaartistica','$txtratoslibres',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }     

        
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso8(Request $request){
        $txtmediotransporte=$request->txtmediotransporte;
        $txtmediotransportespecifique=$request->txtmediotransportespecifique;
        $txttiempodemora=$request->txttiempodemora;
        $txtcuentacelular=$request->txtcuentacelular;
        $txtpagoservicio=$request->txtpagoservicio;
        $txtbeneficiario=$request->txtbeneficiario;
        $txtespecifiquebeneficiario=$request->txtespecifiquebeneficiario;
        $txtestado = 1;
        $USUARIO = Auth::id();

        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteOtrosAspectosRelevantes=(DB :: select( "call P_VAL_EXI_FSE_OTROS_ASPECTOS_RELEVANTES($n_codigoalumno)"));
        $n_existeOtrosAspectosRelevantes='';    
        foreach($arrayExisteOtrosAspectosRelevantes as $obj){
            $n_existeOtrosAspectosRelevantes = $obj->N_REGISTRO;
        }

        if ($n_existeOtrosAspectosRelevantes==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_OTROS_ASPECTOS_RELEVANTES($n_codigoalumno,$txtmediotransporte,'$txtmediotransportespecifique','$txttiempodemora',$txtcuentacelular,'$txtpagoservicio',$txtbeneficiario,'$txtespecifiquebeneficiario',$txtestado,$USUARIO)")));
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,8,$USUARIO)")));
            $msg = 'Datos Guardados.';
        }else{
            DB :: statement("call P_ACT_FSE_OTROS_ASPECTOS_RELEVANTES($n_codigoalumno,$txtmediotransporte,'$txtmediotransportespecifique','$txttiempodemora',$txtcuentacelular,'$txtpagoservicio',$txtbeneficiario,'$txtespecifiquebeneficiario',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }           

        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso9(Request $request){
        $txtcondicionestudiante=$request->txtcondicionestudiante;
        $txtpromedioponderado=$request->txtpromedioponderado;
        $txtcursosdesaprobados=$request->txtcursosdesaprobados;
        $txtestudiaotrauniversidad=$request->txtestudiaotrauniversidad;
        $txtespecifiqueotrauniversidad=$request->txtespecifiqueotrauniversidad;
        $txtotrosestudios=$request->txtotrosestudios;
        $txtespecifiqueotrosestudios=$request->txtespecifiqueotrosestudios;
        $txtmotivoeligiounab=$request->txtmotivoeligiounab;
        $txtmotivoeligioprofesion=$request->txtmotivoeligioprofesion;
        $txtabandono=$request->txtabandono;
        $txtimplementaruniversidad=$request->txtimplementaruniversidad;
        $txtestado = 1;
        $USUARIO = Auth::id();

        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteSituacionAcademica=(DB :: select( "call P_VAL_EXI_FSE_SITUACION_ACADEMICA($n_codigoalumno)"));
        $n_existeSitucionAcademica='';    
        foreach($arrayExisteSituacionAcademica as $obj){
            $n_existeSitucionAcademica = $obj->N_REGISTRO;
        }

        if ($n_existeSitucionAcademica==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SITUACION_ACADEMICA($n_codigoalumno,$txtcondicionestudiante,'$txtpromedioponderado','$txtcursosdesaprobados',$txtestudiaotrauniversidad,'$txtespecifiqueotrauniversidad',$txtotrosestudios,'$txtespecifiqueotrosestudios','$txtmotivoeligiounab','$txtmotivoeligioprofesion','$txtabandono','$txtimplementaruniversidad',$txtestado,$USUARIO)")));
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,9,$USUARIO)")));
            $msg = 'Datos Guardados.';
        }else{
             DB :: statement("call P_ACT_FSE_SITUACION_ACADEMICA($n_codigoalumno,$txtcondicionestudiante,'$txtpromedioponderado','$txtcursosdesaprobados',$txtestudiaotrauniversidad,'$txtespecifiqueotrauniversidad',$txtotrosestudios,'$txtespecifiqueotrosestudios','$txtmotivoeligiounab','$txtmotivoeligioprofesion','$txtabandono','$txtimplementaruniversidad',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';

        }

        return response()->json(['success' => true,'message' => $msg]);
    }

    function nuevoFamiliar(){
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayListarFamiliar=(DB :: select( "call P_LIS_FSE_SITUACION_FAMILIAR($n_codigoalumno)"));
        $edata='2';
        foreach($arrayListarFamiliar as $obj){
            $edata .= '<tr>
                         <td>' . '</td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->APELLIDOSNOMBRES. '</span><input class="tabledit-input form-control input-sm" type="text" name="First" value="'.$obj->APELLIDOSNOMBRES.'"></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->DESCRIPCIONPARENSTESCO. '</span></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->DESCRIPCIONSEXO. '</span></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' . '</td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->DESCRIPCIONESTADOCIVIL. '</span></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->DESCRIPCIONGRADOINSTRUCCION. '</span></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .$obj->DESCRIPCIONOCUPACION. '</span></td>
                         <td class="tabledit-view-mode"><span class="tabledit-span">' .'<div class="tabledit-toolbar btn-toolbar" style="text-align: left;"><div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-sm btn-default" style="float: none;"><span class="feather icon-edit"></span></button><button type="button" class="tabledit-delete-button btn btn-sm btn-default" style="float: none;"><span class="feather icon-trash-2"></span></button></div><button type="button" class="tabledit-save-button btn btn-sm btn-success" style="display: none; float: none;">Save</button><button type="button" class="tabledit-confirm-button btn btn-sm btn-danger" style="display: none; float: none;">Confirm</button><button type="button" class="tabledit-restore-button btn btn-sm btn-warning" style="display: none; float: none;">Restore</button></div>' .'</td>
                      </tr>
                     ';
        }
        // RETURN OUTPUT
        echo $edata;
    }

}
