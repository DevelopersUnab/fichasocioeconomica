<?php

namespace App;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

class MD_ADM001 extends Model
{
    protected $table = 'adm_ubigeo';


    public static function departamentos(){
    	return MD_ADM001::select("id as iddepa", "departamento")
    					->where('id', 'like', '%0000')
    					->get();
    }

    public static function provincias($iddepartamento){
    	return MD_ADM001::select("id as idprov", "provincia")
    					->where('id', 'like', substr($iddepartamento, 0, 2).'%00')
    					->where('id', '<>', $iddepartamento)
    					->get();
    }

    public static function distritos($idprovincia){
    	return MD_ADM001::select("id as iddist", "distrito")
    					->where('id', 'like', substr($idprovincia, 0, 4).'%')
    					->where('id', '<>', $idprovincia)
    					->get();
    }

    public function getDepartamento($idubigeo){
        return MD_ADM001::find(substr($idubigeo, 0, 2).'%0000');
    }
    public function getProvincia($idubigeo)
    {
        return MD_ADM001::find(substr($idubigeo, 0, 4).'%00');
    }
    public function getDistrito($idubigeo)
    {
        return MD_ADM001::find($idubigeo);
    }
}
