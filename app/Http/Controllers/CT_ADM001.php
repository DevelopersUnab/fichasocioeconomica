<?php

namespace App\Http\Controllers;
use App\MD_ADM001;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CT_ADM001 extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function getProvincias($iddepartamento)
    {
    	$provincias = MD_ADM001::provincias($iddepartamento);
    	return response()->json(array('provincias'=>$provincias));
    }

    function getDistritos($idprovincia)
    {
    	$distritos = MD_ADM001::distritos($idprovincia);
    	return response()->json(array('distritos'=>$distritos));
    }

}
