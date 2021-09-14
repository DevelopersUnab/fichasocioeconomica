<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;
use DB;

class CT_FSE703 extends Controller
{

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function generarFicha($codigoproceso,$carnetuniversitario)
    {
        return $this->pdfFicha($codigoproceso,$carnetuniversitario);
    }

    public function pdfFicha($codigoproceso,$carnetuniversitario)
    {
        $USUARIO = Auth::id();
        $constancia = (DB :: select( DB :: raw ("CALL P_GEN_CONSTANCIA_ALUMNO_CARNET('$carnetuniversitario')")));
        $capitulo_i = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_I_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_ii = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_II_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_iii = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_III_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_iv = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_IV_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_iv_detalle_gastos = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_IV_DETALLE_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario',42)")));
        $capitulo_iv_detalle_egreso = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_IV_DETALLE_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario',43)")));
        $capitulo_iv_detalle_ingreso = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_IV_DETALLE_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario',44)")));
        $capitulo_v = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_V_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_vi = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_VI_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_vii = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_VII_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_viii = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_VIII_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
        $capitulo_ix = (DB :: select( DB :: raw ("CALL P_GEN_FICHA_CAPITULO_IX_ALUMNO_CARNET($codigoproceso,'$carnetuniversitario')")));
				$categorizacion = (DB :: select( DB :: raw ("CALL P_LIS_FSE_FICHA_CALIFICADAS_CARNETUNIVERSITARIO($codigoproceso,'$carnetuniversitario')")));

        $semestre = (DB :: select( DB :: raw ("CALL P_OBT_FSE_PROCESO_ACTIVO()")));

        $n_semestrenombreanio='';
        foreach($semestre as $obj){
            $n_semestrenombreanio = $obj->NOMBREANIO;
        }

        $semestreseleccionado = (DB :: select( DB :: raw ("CALL P_OBT_FSE_PROCESO_DESCRIPCION($codigoproceso)")));
        $n_semestre='';
        foreach($semestreseleccionado as $obj){
            $n_semestre = $obj->SEMESTRE;
        }

        $dato=count($constancia);
        if ($dato==0) {
            return view('VB_SIS001')->with('constancia',$constancia);
        } else {
            $html = view('reportes.VB_FSE703')->with('constancia',$constancia)->with('codigoproceso',$codigoproceso)->with('capitulo_i',$capitulo_i)->with('capitulo_ii',$capitulo_ii)->with('capitulo_iii',$capitulo_iii)->with('capitulo_iv',$capitulo_iv)->with('capitulo_iv_detalle_gastos',$capitulo_iv_detalle_gastos)->with('capitulo_iv_detalle_egreso',$capitulo_iv_detalle_egreso)->with('capitulo_iv_detalle_ingreso',$capitulo_iv_detalle_ingreso)->with('capitulo_v',$capitulo_v)->with('capitulo_vi',$capitulo_vi)->with('capitulo_vii',$capitulo_vii)->with('capitulo_viii',$capitulo_viii)->with('capitulo_ix',$capitulo_ix)->with('n_semestre',$n_semestre)->with('categorizacion',$categorizacion);
        }
        $namefile = 'Ficha-'.$carnetuniversitario.'-'.time().'.pdf';

        $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];
        $mpdf = new Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path() . '/fonts',
            ]),
            'fontdata' => $fontData + [
                'arial' => [
                    'R' => 'arial.ttf',
                    'B' => 'arialbd.ttf',
                ],
            ],
            'default_font' => 'arial',
            // "format" => "A4",
            "format" => [210,297],
            "setAutoTopMargin"=>'stretch',
            "setAutoBottomMargin"=>'stretch'
        ]);
        //$logo="'images/logoperu.png'";
        $url = asset("images/logoperu.png");
        $mpdf->SetHTMLHeader('<div style="text-align: right;  font-weight: bold; font-size: 10pt;">
            <table width="100%" style="text-align: center;">
            <tr>
                <td>
                    <img src="/usr/share/nginx/www/fichasocioeconomica/public/images/logoperu.png" width="75" height="75">
                </td>
                <td>
                    <u style="color: #000000; font-size: 20px;"><strong>UNIVERSIDAD NACIONAL DE BARRANCA</strong></u>
                    <p style="color: #000000; font-size: 18px; font-weight: bold;">UNIDAD BIENESTAR UNIVERSITARIO</p>
                    <p style="color: #000000; font-size: 18px; font-weight: bold;">SERVICIO SOCIAL</p>
                </td>
                <td>
                    <img src="/usr/share/nginx/www/fichasocioeconomica/public/images/logounabchico.jpeg" width="75" height="75">
                </td>
            </tr>
        </table>
        <hr>
        </div>','O');
        $mpdf->SetHTMLFooter('
        <table width="100%">
            <tr>
                <td width="33%">Fecha: {DATE j/m/Y}</td>
                <td width="33%" align="center">Pagina {PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right;">UNAB</td>
            </tr>
        </table>');
        $mpdf->allow_charset_conversion = true;
        $mpdf->charset_in = 'UTF-8';
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $fechaactual= 'Fecha:'.date('d/m/y');
        $mpdf->Output($namefile,"I");
    }
}
