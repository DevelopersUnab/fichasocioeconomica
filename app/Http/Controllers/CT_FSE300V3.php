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
        $beneficiarioPrograma = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(17)")));
        $condicionEstudiante = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(31)")));        
        $situacionFamiliar = (DB :: select( DB :: raw ("CALL P_LIS_FSE_SITUACION_FAMILIAR($n_codigoalumno)")));
        $parentesco = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(32)")));
        $sexo = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(33)")));
        $estadocivils = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(20)")));
        $gradoInstruccionJefe = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(7)")));
        $ocupacion = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(34)")));
        $nroItem = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SITUACION_FAMILIAR_ITEM($n_codigoalumno)")));
        $n_nroItem='';
        foreach($nroItem as $obj){
            $n_nroItem = $obj->NREGISTRO;
        }
        $seguro = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(35)")));
        $tipoenfermedad = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(36)")));
        $tipoenfermedadcronica = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(37)")));
        $tipoenfermedadinfecciosa = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(38)")));
        $tipomedicamentos = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(39)")));
        $tipoantecendentesquirurgico = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(40)")));
        $problemassociales = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(16)")));
        $condicionLaboral = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(3)")));
        $financiaEstudios = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(41)")));
        $gastosDiarios = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(42)")));
        $egresoMensual = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(43)")));
        $ingresoMensual = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PARAMETROS_DETALLE_DESCRIPCION(44)")));

        

        return view('proceso.VB_FSE300')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('estados', $estados)->with('procesos', $procesos)->with('capitulos', $capitulos)->with('facultades', $facultades)->with('escuelas', $escuelas)->with('ciclos', $ciclos)->with('estadocivil', $estadocivil)->with('idiomasmaterna', $idiomasmaterna)->with('tipocolegios', $tipocolegios)->with('estadoFicha', $n_estadoFicha)->with('lugarProcedencia', $lugarProcedencia)->with('condicionVivienda', $condicionVivienda)->with('materialParedes', $materialParedes)->with('materialTechos', $materialTechos)->with('materialPiso', $materialPiso)->with('servicioLuz', $servicioLuz)->with('servicioAgua', $servicioAgua)->with('servicioDesague', $servicioDesague)->with('personasDomicilio', $personasDomicilio)->with('ambientesVivienda', $ambientesVivienda)->with('dormitoriosVivienda', $dormitoriosVivienda)->with('personasDormitorio', $personasDormitorio)->with('hogarTiene', $hogarTiene)->with('servicioComplementario', $servicioComplementario)->with('ingieresalimentos', $ingieresalimentos)->with('religionPertenece', $religionPertenece)->with('medioTransporte', $medioTransporte)->with('beneficiarioPrograma', $beneficiarioPrograma)->with('condicionEstudiante', $condicionEstudiante)->with('situacionFamiliar', $situacionFamiliar)->with('parentesco', $parentesco)->with('sexo', $sexo)->with('estadocivils', $estadocivils)->with('gradoInstruccionJefe', $gradoInstruccionJefe)->with('ocupacion', $ocupacion)->with('n_nroItem', $n_nroItem)->with('seguro', $seguro)->with('tipoenfermedad', $tipoenfermedad)->with('tipoenfermedadcronica', $tipoenfermedadcronica)->with('tipoenfermedadinfecciosa', $tipoenfermedadinfecciosa)->with('tipomedicamentos', $tipomedicamentos)->with('tipoantecendentesquirurgico', $tipoantecendentesquirurgico)->with('problemassociales', $problemassociales)->with('condicionLaboral', $condicionLaboral)->with('financiaEstudios', $financiaEstudios)->with('gastosDiarios', $gastosDiarios)->with('egresoMensual', $egresoMensual)->with('ingresoMensual', $ingresoMensual);
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
        $txtsexo=$request->radioSexo;
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
        //$txtsexo=$request->txtsexo;
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
            DB :: statement("call P_INS_FSE_DATOSPERSONALES($n_codigoalumno,$txtsexo,$txtedad,$txtciclo,'$txtanioingreso','$txtcorreoelectronico','$txtcelular','$txtfijo','$txtfechanacimiento','$txtubigeo','$txtlugarnacimiento','$txttelefonoemergencia','$txttutorresponsable',$txtestadocivil,$txtidiomamaterna,'$txtidiomamaternaespecificar','$txtinstitucioneducativa',$txttipocolegio,'$txttipocolegioespecificar',$txtestado,'$USUARIO')");
            $msg = 'Datos Guardados.';
        } else {
            DB :: statement("call P_ACT_FSE_DATOSPERSONALES($n_codigoalumno,$txtsexo,$txtedad,$txtciclo,'$txtanioingreso','$txtcorreoelectronico','$txtcelular','$txtfijo','$txtfechanacimiento','$txtubigeo','$txtlugarnacimiento','$txttelefonoemergencia','$txttutorresponsable',$txtestadocivil,$txtidiomamaterna,'$txtidiomamaternaespecificar','$txtinstitucioneducativa',$txttipocolegio,'$txttipocolegioespecificar',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }
            
       
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso2(Request $request){
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }
        $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,2,$USUARIO)")));
    }

    public function paso3(Request $request){
        $txtdireccionactual=$request->txtdireccionactual;
        $txtreferenciadomicilio=$request->txtreferenciadomicilio;
        $txtnrotelefono=$request->txtnrotelefono;
        $txtlocalizacion=$request->txtlocalizacion;
        $txtespecificarlocalizacion=$request->txtespecificarlocalizacion;
        $txtvivienda=$request->txtvivienda;
        $txtespecificarvivienda=$request->txtespecificarvivienda;
        $txtviviendaparedes=$request->txtviviendaparedes;
        $txtviviendatechos=$request->txtviviendatechos;
        $txtviviendapisos=$request->txtviviendapisos;
        $txtserviciosluz=$request->txtserviciosluz;
        $txtserviciosagua=$request->txtserviciosagua;
        $txtserviciosdesague=$request->txtserviciosdesague;
        $txtnropersonasdomicilio=$request->txtnropersonasdomicilio;
        $txtnroambientevivienda=$request->txtnroambientevivienda;
        $txtnrodormitoriovivienda=$request->txtnrodormitoriovivienda;
        $txtnropersonasdormitorio=$request->txtnropersonasdormitorio;
        $txthogarequiposonido=$request->checkboxHogar1;
        $txthogartelevisor=$request->checkboxHogar2;
        $txthogardvd=$request->checkboxHogar3;
        $txthogarlicuadora=$request->checkboxHogar4;
        $txthogarrefrigadora=$request->checkboxHogar5;
        $txthogarcocina=$request->checkboxHogar6;
        $txthogarlavadora=$request->checkboxHogar7;
        $txthogarplanchaelectrica=$request->checkboxHogar8;
        $txthogarhorno=$request->checkboxHogar9;
        $txthogarcomputadora=$request->checkboxHogar10;
        $txthogarimpresora=$request->checkboxHogar11;
        $txthogarninguno=$request->checkboxHogar12;
        $txtserviciotelefono=$request->checkboxServicioC1;
        $txtserviciointernet=$request->checkboxServicioC2;
        $txtserviciocable=$request->checkboxServicioC3;
        $txtestado = 1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExisteViviendaServicios=(DB :: select( "call P_VAL_EXI_FSE_ALIMENTACION($n_codigoalumno)"));
        $n_existeViviendaServicios='';
        foreach($arrayExisteViviendaServicios as $obj){
            $n_existeViviendaServicios = $obj->N_REGISTRO;
        }

        if ($n_existeViviendaServicios==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_VIVIENDA_SERVICIOS_BASICOS($n_codigoalumno,'$txtdireccionactual','$txtreferenciadomicilio','$txtnrotelefono',$txtlocalizacion,'$txtespecificarlocalizacion',$txtvivienda,'$txtespecificarvivienda',$txtviviendaparedes,$txtviviendatechos,$txtviviendapisos,$txtserviciosluz,$txtserviciosagua,$txtserviciosdesague,$txtnropersonasdomicilio,$txtnroambientevivienda,$txtnrodormitoriovivienda,$txtnropersonasdormitorio,'$txthogarequiposonido','$txthogartelevisor','$txthogardvd','$txthogarlicuadora','$txthogarrefrigadora','$txthogarcocina','$txthogarlavadora','$txthogarplanchaelectrica','$txthogarhorno','$txthogarcomputadora','$txthogarimpresora','$txthogarninguno','$txtserviciotelefono','$txtserviciointernet','$txtserviciocable',$txtestado,$USUARIO)")));
            $ficha2 = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,3,$USUARIO)")));
            $msg = 'Datos Guardados.';
        }else{
            DB :: statement("call P_ACT_FSE_VIVIENDA_SERVICIOS_BASICOS($n_codigoalumno,'$txtdireccionactual','$txtreferenciadomicilio','$txtnrotelefono',$txtlocalizacion,'$txtespecificarlocalizacion',$txtvivienda,'$txtespecificarvivienda',$txtviviendaparedes,$txtviviendatechos,$txtviviendapisos,$txtserviciosluz,$txtserviciosagua,$txtserviciosdesague,$txtnropersonasdomicilio,$txtnroambientevivienda,$txtnrodormitoriovivienda,$txtnropersonasdormitorio,'$txthogarequiposonido','$txthogartelevisor','$txthogardvd','$txthogarlicuadora','$txthogarrefrigadora','$txthogarcocina','$txthogarlavadora','$txthogarplanchaelectrica','$txthogarhorno','$txthogarcomputadora','$txthogarimpresora','$txthogarninguno','$txtserviciotelefono','$txtserviciointernet','$txtserviciocable',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso4(Request $request){
        $txttrabaja=$request->txttrabaja;
        $txtcondicionlaboral=$request->txtcondicionlaboral;
        $txtespecifiquecondicionlaboral=$request->txtespcifiquecondicionlaboral;
        $txtestudiosfinanciaestudios=$request->txtfinanciaestudios;
        $txtespecifiquefinanciaestudios=$request->txtespeicfiquefinanciaestudios;
        $txttotalegresosmensual=$request->txttotalegresosmensual;
        $txttotalgastosdiarios=$request->txttotalgastosdiarios;
        $txtestado = 1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExistesSituacionEconomica=(DB :: select( "call P_VAL_EXI_FSE_SITUACION_ECONOMICA($n_codigoalumno)"));
        $n_existeSituacionEconomica='';
        foreach($arrayExistesSituacionEconomica as $obj){
            $n_existeSituacionEconomica = $obj->N_REGISTRO;
        }

        if ($n_existeSituacionEconomica==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SITUACION_ECONOMICA($n_codigoalumno,$txttrabaja,'$txtcondicionlaboral','$txtespecifiquecondicionlaboral',$txtestudiosfinanciaestudios,'$txtespecifiquefinanciaestudios','$txttotalegresosmensual','$txttotalgastosdiarios',$txtestado,$USUARIO)")));
        
            $txtmontoingresoMensualArray = $request->input('txtmontoIngreso');
            $nroIngresoMensual = count($txtmontoingresoMensualArray);       
            $montoIngresoMensual=0;
            for ($i = 1; $i <= $nroIngresoMensual; $i++) {
                $codigoparametro=$request->input('txtcodigoparametroIM');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalleIM')[$i];
                $montoIngresoMensual=str_replace(",","",$request->input('txtmontoIngreso')[$i]);
                DB :: select( "call P_INS_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$montoIngresoMensual',$txtestado,$USUARIO)");
            }
            $txtmontoegresoMensualArray = $request->input('txtmontoEgreso');
            $nroEgresoMensual = count($txtmontoegresoMensualArray);       
            $montoEgresoMensual=0;
            for ($i = 1; $i <= $nroEgresoMensual; $i++) {
                $codigoparametro=$request->input('txtcodigoparametroEM');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalleEM')[$i];
                $montoEgresoMensual=str_replace(",","",$request->input('txtmontoEgreso')[$i]);
                DB :: select( "call P_INS_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$montoEgresoMensual',$txtestado,$USUARIO)");
            }
            $txtmontoArray = $request->input('txtmonto');
            $nroGatosDiarios = count($txtmontoArray);       
            $monto=0;
            for ($i = 1; $i <= $nroGatosDiarios; $i++) {
                $codigoparametro=$request->input('txtcodigoparametro');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalle')[$i];
                $monto=str_replace(",","",$request->input('txtmonto')[$i]);
                DB :: select( "call P_INS_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$monto',$txtestado,$USUARIO)");
            }
            $ficha2 = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,4,$USUARIO)")));
            $msg = 'Datos Guardados.';
        } else {
            $txtmontoingresoMensualArray = $request->input('txtmontoIngreso');
            $nroIngresoMensual = count($txtmontoingresoMensualArray);       
            $montoIngresoMensual=0;
            for ($i = 1; $i <= $nroIngresoMensual; $i++) {
                $codigoparametro=$request->input('txtcodigoparametroIM');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalleIM')[$i];
                $montoIngresoMensual=str_replace(",","",$request->input('txtmontoIngreso')[$i]);
                DB :: select( "call P_ACT_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$montoIngresoMensual',$txtestado,$USUARIO)");
            }
            $txtmontoegresoMensualArray = $request->input('txtmontoEgreso');
            $nroEgresoMensual = count($txtmontoegresoMensualArray);       
            $montoEgresoMensual=0;
            for ($i = 1; $i <= $nroEgresoMensual; $i++) {
                $codigoparametro=$request->input('txtcodigoparametroEM');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalleEM')[$i];
                $montoEgresoMensual=str_replace(",","",$request->input('txtmontoEgreso')[$i]);
                DB :: select( "call P_ACT_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$montoEgresoMensual',$txtestado,$USUARIO)");
            }
            $txtmontoArray = $request->input('txtmonto');
            $nroGatosDiarios = count($txtmontoArray);       
            $monto=0;
            for ($i = 1; $i <= $nroGatosDiarios; $i++) {
                $codigoparametro=$request->input('txtcodigoparametro');
                $codigoparametrodetalle=$request->input('txtcodigoparametrodetalle')[$i];
                $monto=str_replace(",","",$request->input('txtmonto')[$i]);
                DB :: select( "call P_ACT_FSE_SITUACION_ECONOMICA_DETALLE($n_codigoalumno,$codigoparametro,$codigoparametrodetalle,'$monto',$txtestado,$USUARIO)");
            }
            DB :: statement("call P_ACT_FSE_SITUACION_ECONOMICA($n_codigoalumno,$txttrabaja,'$txtcondicionlaboral','$txtespecifiquecondicionlaboral',$txtestudiosfinanciaestudios,'$txtespecifiquefinanciaestudios','$txttotalegresosmensual','$txttotalgastosdiarios',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }
        return response()->json(['success' => true,'message' => $msg]);
    }

    public function paso5(Request $request){
        $txtseguro=$request->txtseguro;
        $txtpadeceenfermedad=$request->txtpadecidoenfermedad;
        $txttipoenfermedad=$request->txttipoenferemedad;
        $txtespecifiquetipoenfermedad=$request->txtespecificartipoenfermedad;
        $txtpadecenfermedadcronica=$request->txtpadecidoenfermedadcronica;
        $txttipoenfermedadcronica=$request->txttipoenferemedadcronica;
        $txtespecifiquetipoenfermedadcronica=$request->txtespecificartipoenfermedadcronica;
        $txtpadecenfermedadinfecciosa=$request->txtpadecidoenfermedadinfecciosa;
        $txttipoenfermedadinfecciosa=$request->txttipoenferemedadinfecciosa;
        $txtespecifiquetipoenfermedadinfecciosa=$request->txtespecificartipoenfermedadinfecciosa;
        $txtalergicomedicamento=$request->txtalergicomedicamento;
        $txttipomedicamento=$request->txttipomedicamento;
        $txtespecifiquetipomedicamento=$request->txtespecificartipomedicamento;
        $txtantecedentesquirugicos=$request->txtantecedentesquirurgicos;
        $txttipoantecedentesquirurgicos=$request->txttipoantecedentesquirurgicos;
        $txtespecifiquetipoantecedentesquirurgicos=$request->txtespecifiquetipoantecedentesquirurgicos;
        $txtpadeceenfermedadfamiliar=$request->txtenfermerdadfamiliar;
        $txttipoenfermedadfamiliar=$request->txttipoenferemedadfamiliar;
        $txtespecifiquetipoenfermedadfamiliar=$request->txttespecifiquetipoenfernedadfamiliar;
        $txtpadecetipodiscapacidad=$request->txtpadecetipodiscapacidad;
        $txtespecifiquetipodiscapacidad=$request->txtespecifiquetipodiscapacidad;
        $txtactualidadgestando=$request->txtactualidadgestando;
        $txtespecifiqueactualidadgestando=$request->txtespecifiquefechamestruacion;
        $txtespeficiquegestando=$request->txtespecifiquefechaprobableparto;
        $txtalcoholismo=$request->checkboxPS1;
        $txtviolenciafamiliar=$request->checkboxPS2;
        $txtembarazonodeseado=$request->checkboxPS3;
        $txtviolenciapsicologica=$request->checkboxPS4;
        $txtviolenciasexual=$request->checkboxPS5;
        $txtabusodrogas=$request->checkboxPS6;
        $txtantecedentespenales=$request->checkboxPS7;
        $txtrelacionesfamiliaresconflictivas=$request->checkboxPS8;
        $txtotros=$request->checkboxPS9;
        $txtespecifiqueproblemasfamilia=$request->txtespecifiqueproblemassociales;
        $txtestado = 1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $arrayExistesSalud=(DB :: select( "call P_VAL_EXI_FSE_SALUD($n_codigoalumno)"));
        $n_existeSalud='';
        foreach($arrayExistesSalud as $obj){
            $n_existeSalud = $obj->N_REGISTRO;
        }

        if ($n_existeSalud==0) {
            $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SALUD($n_codigoalumno,$txtseguro,$txtpadeceenfermedad,'$txttipoenfermedad','$txtespecifiquetipoenfermedad',$txtpadecenfermedadcronica,'$txttipoenfermedadcronica','$txtespecifiquetipoenfermedadcronica',$txtpadecenfermedadinfecciosa,'$txttipoenfermedadinfecciosa','$txtespecifiquetipoenfermedadinfecciosa',$txtalergicomedicamento,'$txttipomedicamento','$txtespecifiquetipomedicamento',$txtantecedentesquirugicos,'$txttipoantecedentesquirurgicos','$txtespecifiquetipoantecedentesquirurgicos',$txtpadeceenfermedadfamiliar,'$txttipoenfermedadfamiliar','$txtespecifiquetipoenfermedadfamiliar',$txtpadecetipodiscapacidad,'$txtespecifiquetipodiscapacidad','$txtactualidadgestando','$txtespecifiqueactualidadgestando','$txtespeficiquegestando','$txtalcoholismo','$txtviolenciafamiliar','$txtembarazonodeseado','$txtviolenciapsicologica','$txtviolenciasexual','$txtabusodrogas','$txtantecedentespenales','$txtrelacionesfamiliaresconflictivas','$txtotros','$txtespecifiqueproblemasfamilia',$txtestado,$USUARIO)")));
            $ficha2 = (DB :: select( DB :: raw ("CALL P_ACT_FSE_FICHA($n_codigoalumno,5,$USUARIO)")));
            $msg = 'Datos Guardados.';
        } else {
            DB :: statement("call P_ACT_FSE_SALUD($n_codigoalumno,$txtseguro,$txtpadeceenfermedad,'$txttipoenfermedad','$txtespecifiquetipoenfermedad',$txtpadecenfermedadcronica,'$txttipoenfermedadcronica','$txtespecifiquetipoenfermedadcronica',$txtpadecenfermedadinfecciosa,'$txttipoenfermedadinfecciosa','$txtespecifiquetipoenfermedadinfecciosa',$txtalergicomedicamento,'$txttipomedicamento','$txtespecifiquetipomedicamento',$txtantecedentesquirugicos,'$txttipoantecedentesquirurgicos','$txtespecifiquetipoantecedentesquirurgicos',$txtpadeceenfermedadfamiliar,'$txttipoenfermedadfamiliar','$txtespecifiquetipoenfermedadfamiliar',$txtpadecetipodiscapacidad,'$txtespecifiquetipodiscapacidad',$txtactualidadgestando,'$txtespecifiqueactualidadgestando','$txtespeficiquegestando','$txtalcoholismo','$txtviolenciafamiliar','$txtembarazonodeseado','$txtviolenciapsicologica','$txtviolenciasexual','$txtabusodrogas','$txtantecedentespenales','$txtrelacionesfamiliaresconflictivas','$txtotros','$txtespecifiqueproblemasfamilia',$txtestado,'$USUARIO')");
            $msg = 'Actualizo su Datos.';
        }    
        return response()->json(['success' => true,'message' => $msg]);
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

    /*function nuevoFamiliar(Request $request){
        $txtapellidosnombres='';
        $txtparestensco='0';
        $txtsexo='0';
        $txtedad='';
        $txtestadocivil='0';
        $txtgradoinstruccion='0';
        $txtocupacion='0';
        $txtestado=1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SITUACION_FAMILIAR($n_codigoalumno,'$txtapellidosnombres',$txtparestensco,$txtsexo,'$txtedad',$txtestadocivil,$txtgradoinstruccion,$txtocupacion,$txtestado,$USUARIO)")));
        
    }*/

    function nuevoFamiliar(Request $request){
        $txtapellidosnombres=$request->txtapellidosnombresfamiliar;
        $txtparestensco=$request->txtparentescofamiliar;
        $txtsexo=$request->radioSexoFamiliar;
        $txtedad=$request->txtedadfamiliar;
        $txtestadocivil=$request->txtestadocivilfamiliar;
        $txtgradoinstruccion=$request->txtgradoinstruccionfamiliar;
        $txtocupacion=$request->txtocupacionfamiliar;
        $txtestado=1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $ficha = (DB :: select( DB :: raw ("CALL P_INS_FSE_SITUACION_FAMILIAR($n_codigoalumno,'$txtapellidosnombres',$txtparestensco,$txtsexo,'$txtedad',$txtestadocivil,$txtgradoinstruccion,$txtocupacion,$txtestado,$USUARIO)")));
        
        $msg='ingreso';
        return response()->json(['success' => true,'message' => $msg]); 
    }

    function actualizarFamiliar(Request $request){
        $txtitem=$request->txtcodigoitem;
        $txtapellidosnombres=$request->txtapellidosnombresfamiliar;;
        $txtparestensco=$request->txtparentescofamiliar;
        $txtsexo=$request->radioSexoFamiliar;
        $txtedad=$request->txtedadfamiliar;
        $txtestadocivil=$request->txtestadocivilfamiliar;
        $txtgradoinstruccion=$request->txtgradoinstruccionfamiliar;
        $txtocupacion=$request->txtocupacionfamiliar;
        $txtestado=1;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }

        $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_SITUACION_FAMILIAR($txtitem,$n_codigoalumno,'$txtapellidosnombres',$txtparestensco,$txtsexo,$txtedad,$txtestadocivil,$txtgradoinstruccion,$txtocupacion,$txtestado,$USUARIO)")));
        $msg='ingreso';
        return response()->json(['success' => true,'message' => $msg]); 
    }

    function eliminarFamiliar(Request $request){
        $txtitem=$request->txtcodigoitemE;
        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }
        $ficha2 = (DB :: select( DB :: raw ("CALL P_ELI_FSE_SITUACION_FAMILIAR($txtitem,$n_codigoalumno)")));
        return response()->json(['success' => true]); 
    }

    function actualizarEliminarFamiliar(Request $request){
        $input = filter_input_array(INPUT_POST);
        $input2 = $request->id;
        $input3 = $request->input('id');


        $USUARIO = Auth::id();
        $arrayCodigoAlumno=(DB :: select( "call P_OBT_SGA_ALUMNO_CODIGOALUMNO($USUARIO)"));
        $n_codigoalumno='';
        foreach($arrayCodigoAlumno as $obj){
            $n_codigoalumno = $obj->CODIGOALUMNO;
        }
 
        if ($input['action'] === 'edit') 
        { 
            $txtitem=trim($input['ITEM_ID']);
            $txtapellidosnombres=trim($input['APELLIDOSNOMBRES']);
            $txtparestensco=trim($input['PARENTESCO']);
            $txtsexo=trim($input['SEXO']);
            $txtedad=trim($input['EDAD']);
            $txtestadocivil=trim($input['ESTADOCIVIL']);
            $txtgradoinstruccion=trim($input['GRADOINSTRUCION']);
            $txtocupacion=trim($input['OCUPACION']);
            $txtestado=1;
            
            $ficha = (DB :: select( DB :: raw ("CALL P_ACT_FSE_SITUACION_FAMILIAR($txtitem,$n_codigoalumno,'$txtapellidosnombres',$txtparestensco,$txtsexo,'$txtedad',$txtestadocivil,$txtgradoinstruccion,$txtocupacion,$txtestado,$USUARIO)")));
        } 
        if ($input['action'] === 'delete') 
        {

            $txtitemE=trim($input['ITEM']);
            $ficha2 = (DB :: select( DB :: raw ("CALL P_ELI_FSE_SITUACION_FAMILIAR($txtitemE,$n_codigoalumno)")));
        } 

        return response()->json(['data' => $input ]);
    }

}
