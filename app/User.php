<?php

namespace App;
use App\MD_TIC001;
use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'sis_usuario';

    protected $fillable = [
        'username','name', 'email', 'password','password_desencriptado',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    private function isRol($idrol)
    {
        $rol = MD_TIC001::join('sis_usuario_sistema_rol', 'sis_rol.CODIGOROL', '=', 'sis_usuario_sistema_rol.CODIGOROL')
                    ->select('sis_rol.CODIGOROL', 'sis_rol.NOMBRE', 'sis_rol.DESCRIPCION')
                    ->where('sis_usuario_sistema_rol.CODIGOUSUARIO', $this->id)
                    ->where('sis_usuario_sistema_rol.CODIGOSISTEMA', 2)
                    ->where('sis_rol.CODIGOROL', $idrol)->first();  
                           
        if($rol)
            return 1;
        else 
            return 0;
    }

    public function isAdministrador()
    {
        return $this->isRol(1);     
    }
    public function isAlumno()
    {
        return $this->isRol(2);
    }
    public function isPersonalAdministrativo()
    {
        return $this->isRol(3);
    }
    public function isDocente()
    {
        return $this->isRol(4);
    }
    
    public function isAccesoSistema(){
        $rolAccesoSsitema = MD_TIC002::join('sis_usuario_sistema_rol', 'sis_sistema.CODIGOSISTEMA', '=', 'sis_usuario_sistema_rol.CODIGOSISTEMA')
                    ->select('sis_sistema.CODIGOSISTEMA', 'sis_sistema.NOMBRE', 'sis_sistema.DESCRIPCION')
                    ->where('sis_usuario_sistema_rol.CODIGOUSUARIO', $this->id)
                    ->where('sis_usuario_sistema_rol.CODIGOSISTEMA', 2)
                    ->where('sis_usuario_sistema_rol.ESTADO', 1)->first();  
                           
        if($rolAccesoSsitema)
            return 1;
        else 
            return 0;
    }

    public function getDatos($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_SGA_ALUMNO_DATOS($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosDatosPersonales($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_DATOSPERSONALES_DATOS($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getEstadoFicha()
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_DATOSPERSONALES_DATOS($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosAlimentacion($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_ALIMENTACION($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSocioCultural($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SOCIOCULTURAL_DEPORTIVO($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosOtrosAspectosRelevantes($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_OTROS_ASPECTOS_RELEVANTES($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSituacionAcademica($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SITUACION_ACADEMICA($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosViviendaServiciosBasicos($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_VIVIENDA_SERVICIOS_BASICOS($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosViviendaServiciosBasicosDetalle($P_DATO,$P_PARAMETRO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_VIVIENDA_SERVICIOS_BASICOS_DETALLE($P_DATO,$this->id,$P_PARAMETRO)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSalud($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SALUD($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSaludDetalle($P_DATO,$P_PARAMETRO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SALUD_DETALLE($P_DATO,$this->id,$P_PARAMETRO)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSituacionEconomica($P_DATO)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SITUACION_ECONOMICA($P_DATO,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }

    public function getDatosSituacionEconomicaDetalle($P_DATO,$P_CODIGOPARAMETRO,$P_CODIGOPARAMAETRODETALLE)
    {
        $arrayDatos = (DB :: select( DB :: raw ("CALL P_OBT_FSE_SITUACION_ECONOMICA_DETALLE($P_DATO,$P_CODIGOPARAMETRO,$P_CODIGOPARAMAETRODETALLE,$this->id)")));
        $n_dato='';
        foreach($arrayDatos as $obj){
            $n_dato = $obj->DATO;
        }
        return $n_dato;
    }
}
