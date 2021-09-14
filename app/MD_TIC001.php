<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MD_TIC001 extends Model
{
    protected $table = 'sis_rol';


public static function allactivo()
	{
		return MD_TIC001::select('CODIGOROL as idrol', 'nombre')
    					->get();
	}

  public static function getrol($rolusu){
    	return MD_TIC001::select("CODIGOROL as idusu","nombre")   					
    					->where('idusu', '=',$rolusu)
    					->get();
    }

}
