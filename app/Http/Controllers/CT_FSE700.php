<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;
use DB;

class CT_FSE700 extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function generarConstancia(Request $request)
    {
        return $this->pdfConstancia();
    }

    public function pdfConstancia()
    {
    	$USUARIO = Auth::id();
        $constancia = (DB :: select( DB :: raw ("CALL P_GEN_CONSTANCIA_ALUMNO($USUARIO)")));
        $codigouniversitario = (DB :: select( DB :: raw ("CALL P_OBT_SGA_ALUMNO_CARNETUNIVERSITARIO($USUARIO)")));
        $n_codigouniversitario='';
        foreach($codigouniversitario as $obj){
            $n_codigouniversitario = $obj->CARNETUNIVERSITARIO;
        }

        $semestre = (DB :: select( DB :: raw ("CALL P_OBT_FSE_PROCESO_ACTIVO()")));
        $n_semestre='';
        $n_semestrenombreanio='';
        foreach($semestre as $obj){
            $n_semestre = $obj->SEMESTRE;
            $n_semestrenombreanio = $obj->NOMBREANIO;
        }

        $dato=count($constancia);
        if ($dato==0) {
            return view('VB_SIS001')->with('constancia',$constancia);
        } else {
            $html = view('reportes.VB_FSE700')->with('constancia',$constancia)->with('codigouniversitario',$n_codigouniversitario)->with('semestre',$n_semestre)->with('semestrenombreanio',$n_semestrenombreanio);
        }
        $namefile = 'Constancia-'.time().'.pdf';
 
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
        ]);
        $mpdf->allow_charset_conversion = true;
		$mpdf->charset_in = 'UTF-8';
        // $mpdf->SetTopMargin(5);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->WriteHTML($html);
        $fechaactual= 'Fecha:'.date('d/m/y');

        //$mpdf->SetHTMLFooter($fechaactual.'S');
        $mpdf->SetHTMLFooter('Pagina {nb} / {nbpg}'.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'Fecha : {DATE j/m/Y}');


        // dd($mpdf);
        $mpdf->Output($namefile,"I");
    }

}
