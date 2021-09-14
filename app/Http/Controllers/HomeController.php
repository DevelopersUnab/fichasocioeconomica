<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;
use session;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isAccesoSistema()==1) {
            $id = Auth::id();
            $modulos = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,1)")));
            $modulos2 = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,2)")));
            $modulos3 = (DB :: select( DB :: raw ("CALL P_LIS_SIS_MODULO_SISTEMAS_OPCIONES($id,2,3)")));

            $arrayTipoPersona=(DB :: select( "call P_OBT_SIS_USUARIO_TIPOPERSONA($id)"));

            $n_tipopersona='';
            foreach($arrayTipoPersona as $obj){
                $n_tipopersona = $obj->TIPOPERSONA;
            }

            $n_codigouniversitario='';
            $n_apellidopaterno='';
            $n_apellidomaterno='';
            $n_nombres='';
            $n_escuelaprofesional='';
            $n_dni='';

            if ($n_tipopersona==1) {
                $datos = (DB :: select( DB :: raw ("CALL P_OBT_SIS_USUARIO_DATOS_INICIO($n_tipopersona,$id)")));
                foreach($datos as $obj){
                    $n_codigouniversitario = $obj->USERNAME;
                    $n_apellidopaterno = $obj->APELLIDOPATERNO;
                    $n_apellidomaterno = $obj->APELLIDOMATERNO;
                    $n_nombres = $obj->NOMBRES;
                    $n_dni = $obj->NRODOCUMENTO;
                }

                return view('principal')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('codigouniversitario', $n_codigouniversitario)->with('apellidopaterno', $n_apellidopaterno)->with('apellidomaterno', $n_apellidomaterno)->with('nombres', $n_nombres)->with('escuelaprofesional', $n_escuelaprofesional)->with('dni', $n_dni)->with('tipopersona', $n_tipopersona);

            } else {
                $semestre = (DB :: select( DB :: raw ("CALL P_OBT_FSE_PROCESO_ACTIVO()")));
                $n_codigoprocesoactivo=0;
                foreach($semestre as $obj){
                    $n_codigoprocesoactivo = $obj->ESTADO;
                }

                $arrayCodigoAlumno = (DB :: select( DB :: raw ("CALL P_OBT_SGA_ALUMNO_CODIGOALUMNO($id)")));
                $codigoAlumnoX=0;
                foreach($arrayCodigoAlumno as $obj){
                    $codigoAlumnoX = $obj->CODIGOALUMNO;
                }

                $arrayestadoficha = (DB :: select( DB :: raw ("CALL P_OBT_FSE_FICHA_ESTADO($codigoAlumnoX)")));
                $estadoFicha=0;
                foreach($arrayestadoficha as $obj){
                    $estadoFicha = $obj->ESTADO;
                }

                $datos2 = (DB :: select( DB :: raw ("CALL P_OBT_SGA_ALUMNO_DATOS_INICIO ($n_tipopersona,$id)")));
                foreach($datos2 as $obj){
                    $n_codigouniversitario = $obj->CARNETUNIVERSITARIO;
                    $n_apellidopaterno = $obj->APELLIDOPATERNO;
                    $n_apellidomaterno = $obj->APELLIDOMATERNO;
                    $n_nombres = $obj->NOMBRE;
                    $n_escuelaprofesional = $obj->DESCRIPCIONESCUELA;
                    $n_dni = $obj->NRODOCUMENTO;
                }

                //$url='http://sga.unab.edu.pe/api/apiHabilitados.php?codigo='.$n_codigouniversitario;
                //$url='http://172.18.1.2/api/apiHabilitados.php?codigo='.$n_codigouniversitario;
				$url='http://181.224.226.228/api/apiHabilitados.php?codigo='.$n_codigouniversitario;
				
                /*$ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                $response = curl_exec($ch);
                $str = trim(str_replace('["', ' ', $response));
                $str2 = trim(str_replace('"]', ' ', $str));*/
				
				$str2 = '1';

                if ($str2=='1') {
                    return view('principal')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('codigouniversitario', $n_codigouniversitario)->with('apellidopaterno', $n_apellidopaterno)->with('apellidomaterno', $n_apellidomaterno)->with('nombres', $n_nombres)->with('escuelaprofesional', $n_escuelaprofesional)->with('dni', $n_dni)->with('tipopersona', $n_tipopersona)->with('response', $str2)->with('codigoprocesoactivo', $n_codigoprocesoactivo)->with('estadoficha', $estadoFicha);
                } else {

                    $this->guard()->logout();
                    session()->flush();
                    session()->regenerate();
                    session()->put('success2','This is for info.');
                    return redirect('/');
                }
                //return view('principal')->with('modulos', $modulos)->with('modulos2', $modulos2)->with('modulos3', $modulos3)->with('codigouniversitario', $n_codigouniversitario)->with('apellidopaterno', $n_apellidopaterno)->with('apellidomaterno', $n_apellidomaterno)->with('nombres', $n_nombres)->with('escuelaprofesional', $n_escuelaprofesional)->with('dni', $n_dni)->with('tipopersona', $n_tipopersona)->with('response', $str2);
            }


        } else {
            $this->guard()->logout();

            session()->flush();

            session()->regenerate();

            session()->put('success4','This is for info.');

            return redirect('/');
        }
        //return view('principal');
    }

    public function listarEscuelaCronograma(){
        $id = Auth::id();
        $arrayTipoPersona=(DB :: select( "call P_OBT_SIS_USUARIO_TIPOPERSONA($id)"));

        $n_tipopersona='';
        foreach($arrayTipoPersona as $obj){
            $n_tipopersona = $obj->TIPOPERSONA;
        }

        $semestre = (DB :: select( DB :: raw ("CALL P_OBT_FSE_PROCESO_ACTIVO()")));
        $n_codigoproceso='0';
        foreach($semestre as $obj){
            $n_codigoproceso = $obj->CODIGOPROCESO;
        }

        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_SGA_ALUMNO_DATOS(3,$id)")));
        $n_escuela=0;
        foreach($arrayDatos as $obj){
            $n_escuela = $obj->DATO;
        }

        $escuelas = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO_ESCUELA_CRONOGRAMA($n_tipopersona,$n_codigoproceso,$n_escuela)")));
        //$escuelas = (DB :: select( DB :: raw ("CALL P_LIS_FSE_PROCESO_ESCUELA_CRONOGRAMA(2,1,1)")));

        return response()->json(['data' => $escuelas]);
    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function cambiarContrasena(Request $request)
    {
        $id = Auth::id();
        $arrayTipoPersona=(DB :: select( "call P_OBT_SIS_USUARIO_TIPOPERSONA($id)"));

        $n_tipopersona='';
        foreach($arrayTipoPersona as $obj){
            $n_tipopersona = $obj->TIPOPERSONA;
        }

        $arrayContrasena=(DB :: select( "call P_VAL_EXI_SIS_USUARIO_CONTRASENA($id,$n_tipopersona)"));

        $n_contra='';
        foreach($arrayContrasena as $obj){
            $n_contra = $obj->PASSWORDDES;
        }

        $txtcontrasenactual=$request->txtcontrasenactual;
        $txtcontrasenanueva=$request->txtcontrasenanueva;
        $txtvuelvecontrasenanueva=$request->txtvuelvecontrasenanueva;
        if($n_contra==$txtcontrasenactual){
            if ($txtcontrasenanueva==$txtvuelvecontrasenanueva) {
                $msg='Se cambio correctamente la contraseña.';
                $txtpassword=Hash::make($request->txtcontrasenanueva);
                $txtpassworddescriptado=$txtcontrasenanueva;
                $cambiarContra=(DB :: select( "call P_ACT_SIS_USUARIO_CONTRASENA($id,'$txtpassword','$txtpassworddescriptado',$id)"));
                return response()->json(['success' => true,'message' => $msg]);
            } else {
                $msg='La contraseña nueva no coincide.';
                return response()->json(['success' => false,'message' => $msg]);
            }
        }else{
            $msg='La contraseña actual no coincide.';
                return response()->json(['success' => false,'message' => $msg]);
        }
    }

}
