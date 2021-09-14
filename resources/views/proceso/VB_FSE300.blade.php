@extends('layouts.master')

@section('title', 'CONFIGURACION DE ACTIVIDADS ESPECIALES')

@section('content')
  @parent
  <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ breadcrumb ] start -->
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <div class="page-header-title">
                                                <h5 class="m-b-10">Ficha Socieconomica</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/procesos/ficha') }}">Ficha Socieconomica</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            <div class="row">
                            <!-- [ Smart-Wizard ] start -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>INFORMACION DEL ESTUDIANTE</h5>
                                        <input style="display: none" class="form-control" id="txtestadoficha" type="text" name="txtestadoficha" value="{{$estadoFicha}}">
                                    </div>
                                    <div class="card-body">
                                        <!-- [ SmartWizard html ] start -->
                                        <div id="smartwizard">
                                            <ul style="margin-bottom: 1px;">
                                                @foreach($capitulos as $capitulos)
                                                  <li><a href="#step-{{ $capitulos->CODIGOPARAMETRODETALLE }}">
                                                        <h6>Paso {{ $capitulos->CODIGOPARAMETRODETALLE }}</h6>
                                                        <p class="m-0">{{ $capitulos->DESCRIPCION }}</p>
                                                    </a></li>
                                                @endforeach
                                            </ul>
                                            <div>
                                                <div id="step-1">
                                                  <form class="needs-validation" method="post" id="form_paso1" novalidate>
                                                    <h4>I. DATOS GENERALES</h4>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">1.1. APELLIDOS Y NOMBRES</label>
                                                            <input class="form-control" id="txtapellidosnombres" type="text" name="txtapellidosnombres" value="{{Auth::user()->getDatos(1)}}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.2. EDAD</label>
                                                            <input class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3" id="txtedad" type="number" name="txtedad" value="{{Auth::user()->getDatosDatosPersonales(1)}}" readonly="" >
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;">1.3. CÓDIGO MATRICULA</label>
                                                            <input class="form-control" id="txtcodigomatricula" type="text" name="txtcodigomatricula" value="{{Auth::user()->getDatos(2)}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">1.4. FACULTAD</label>
                                                            <select class="form-control" id="txtfacultad" name="txtfacultad" disabled>
                                                              <option value="">Seleccione</option>
                                                              @foreach($facultades as $facultades)
                                                              <option value="{{ $facultades->CODIGOFACULTAD }}"
                                                                @if($facultades->CODIGOFACULTAD == Auth::user()->getDatos(4))
                                                                  selected
                                                                @endif>{{ $facultades->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">1.5. ESCUELA PROFESIONAL</label>
                                                            <select class="form-control" id="txtescuela" name="txtescuela" disabled>
                                                              <option value="">Seleccione</option>
                                                              @foreach($escuelas as $escuelas)
                                                              <option value="{{ $escuelas->CODIGOESCUELA }}"
                                                              @if($escuelas->CODIGOESCUELA == Auth::user()->getDatos(3))
                                                                  selected
                                                                @endif>{{ $escuelas->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.6. CICLO</label>
                                                            <select class="form-control" id="txtciclo" name="txtciclo" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($ciclos as $ciclos)
                                                              <option value="{{ $ciclos->CODIGOPARAMETRODETALLE }}"
                                                                 @if($ciclos->CODIGOPARAMETRODETALLE == Auth::user()->getDatosDatosPersonales(2))
                                                                        selected
                                                                @endif>{{ $ciclos->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Seleccione el Ciclo.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.7. AÑO DE INGRESO</label>
                                                            <input class="form-control mob_no" id="txtanioingreso" type="text" name="txtanioingreso"  value="{{Auth::user()->getDatosDatosPersonales(3)}}" data-mask="9999-9" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el año de ingreso.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.8. DNI</label>
                                                            <input class="form-control" id="txtdni" type="text" name="txtdni" value="{{Auth::user()->getDatos(5)}}" disabled>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">1.9. CORREO ELECTRONICO</label>
                                                            <input class="form-control thresold-i" id="txtcorreoelectronico" type="email" name="txtcorreoelectronico" value="{{Auth::user()->getDatosDatosPersonales(4)}}" required maxlength="150" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
                                                            <div class="invalid-feedback">
                                                                Ingrese un correo electronico valido.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.10.1. CELULAR</label>
                                                            <input class="form-control thresold-i" id="txtcelular" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" type="number" name="txtcelular" value="{{Auth::user()->getDatosDatosPersonales(5)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el Celular.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">1.10.2. TELEFONO FIJO</label>
                                                            <input class="form-control thresold-i" id="txttelefono" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="9" type="number" name="txttelefono" value="{{Auth::user()->getDatosDatosPersonales(6)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el telefono fijo.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                      <div class="form-group col-md-2">
                                                        <label style="color: black;font-weight: bold;">1.11. FECHA</label>
                                                        <div class="row">
                                                              <div class="form-group col-md-12">
                                                                  <label style="color: black;font-weight: bold;">NACIMIENTO</label>
                                                                  <input class="form-control" id="txtfechanacimiento" type="text" name="txtfechanacimiento" value="{{Auth::user()->getDatosDatosPersonales(7)}}" required onchange="calcularEdad()">
                                                                  <div class="invalid-feedback">
                                                                  Seleccione su fecha de nacimiento.
                                                                  </div>
                                                              </div>
                                                        </div>
                                                        </div>
                                                        <div class="form-group col-md-10">
                                                            <label style="color: black;font-weight: bold;">1.12. PROCEDENCIA</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-4">
                                                                  <label class="mt-3" style="color: black;font-weight: bold;">DEPARTAMENTO</label>
                                                                  <select id="txtdepartamento" class="form-control" name="txtdepartamento" required>
                                                                      <option value="">Seleccione</option>
                                                                      @foreach($departamentos as $departamento)
                                                                          <option value="{{ $departamento->iddepa }}" @if($departamento->iddepa ==substr(Auth::user()->getDatosDatosPersonales(18), 0,2)."0000") selected @endif >
                                                                            {{ $departamento->departamento }}
                                                                          </option>
                                                                      @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el departamento.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label class="mt-3" style="color: black;font-weight: bold;">PROVINCIA</label>
                                                                  <select id="txtprovincia" class="form-control" name="txtprovincia" required
                                                                  @if($provincias == "")
                                                                  disabled>
                                                                    <option value="">(Selecciona)</option>
                                                                  </select>
                                                                  @else
                                                                  >
                                                                  <option value="">Seleccione</option>
                                                                  @foreach($provincias as $provincia)
                                                                    <option value="{{ $provincia->idprov }}"
                                                                        @if($provincia->idprov == substr(Auth::user()->getDatosDatosPersonales(18), 0,4)."00")
                                                                          selected @endif>
                                                                      {{ $provincia->provincia }}
                                                                    </option>
                                                                  @endforeach
                                                                  </select>
                                                                  @endif
                                                                  <div class="invalid-feedback">
                                                                    Seleccione la provincia.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label class="mt-3" style="color: black;font-weight: bold;">DISTRITO</label>
                                                                  <select id="txtdistrito" class="form-control" name="txtdistrito" required @if($distritos == "")
                                                                    disabled>
                                                                    <option value="0">(Selecciona)</option>
                                                                  </select>
                                                                    @else
                                                                    >
                                                                    <option value="">Seleccione</option>
                                                                    @foreach($distritos as $distrito)
                                                                    <option value="{{ $distrito->iddist }}"
                                                                        @if($distrito->iddist == Auth::user()->getDatosDatosPersonales(18))
                                                                          selected @endif>
                                                                      {{ $distrito->distrito }}
                                                                    </option>
                                                                    @endforeach
                                                                  </select>
                                                                    @endif
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el distrito.
                                                                  </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">1.13. LUGAR DE NACIMIENTO (Especificar direccion)</label>
                                                            <input class="form-control thresold-i" id="txtlugarnacimiento" type="text" name="txtlugarnacimiento" value="{{Auth::user()->getDatosDatosPersonales(8)}}" required maxlength="255">
                                                          <div class="invalid-feedback">
                                                              Ingrese el lugar de nacimiento.
                                                          </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">1.14. TELEFONOS DE EMERGENCIA</label>
                                                            <input class="form-control thresold-i" id="txttelefonoemergencia" type="text" name="txttelefonoemergencia" value="{{Auth::user()->getDatosDatosPersonales(9)}}" r maxlength="100" required="">
                                                        <div class="invalid-feedback">
                                                            Ingrese los telefonos de emergencia.
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">1.15. TUTOR RESPONSABLES(familiar)</label>
                                                            <input class="form-control thresold-i" id="txttutorresponsable" type="text" name="txttutorresponsable" value="{{Auth::user()->getDatosDatosPersonales(10)}}" required maxlength="255">
                                                            <div class="invalid-feedback">
                                                                Ingrese el tutor responsable.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                          <label style="margin-bottom: 17px;color: black;font-weight: bold;">1.16. SEXO</label>
                                                          <br>
                                                            <div class="form-group d-inline">
                                                                <div class="radio radio-primary d-inline">
                                                                    <input type="radio" class="custom-control-input" name="radioSexo" id="radio-p-fill-5" onchange="habilitarSexoFemenino()" value="1" required=""
                                                                    @if(Auth::user()->getDatosDatosPersonales(17) == 1)
                                                                        checked
                                                                      @endif>
                                                                    <label for="radio-p-fill-5" class="cr" >Masculino</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group d-inline">
                                                                <div class="radio radio-primary d-inline">
                                                                    <input type="radio" class="custom-control-input" name="radioSexo" id="radio-p-fill-6" onchange="habilitarSexoFemenino()" value="2" required=""
                                                                    @if(Auth::user()->getDatosDatosPersonales(17) == 2)
                                                                        checked
                                                                      @endif>
                                                                    <label for="radio-p-fill-6" class="cr">Femenino</label>
                                                                    <div class="invalid-feedback">
                                                                    <center>
                                                                    Seleccione masculino o femenino.
                                                                    </center>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;">1.17. ESTADO CIVIL</label>
                                                            <select id="txtestadocivil" class="form-control" name="txtestadocivil" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($estadocivil as $estadocivil)
                                                              <option value="{{ $estadocivil->CODIGOPARAMETRODETALLE }}"
                                                                @if($estadocivil->CODIGOPARAMETRODETALLE == Auth::user()->getDatosDatosPersonales(11))
                                                                        selected
                                                                      @endif>{{ $estadocivil->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Seleccione el estado civil.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">1.18. IDIOMA O LENGUA MATERNA CON EL QUE APRENDIO A HABLAR EN SU NIÑEZ</label>
                                                            <select id="txtidiomamaterna" class="form-control" name="txtidiomamaterna" onchange="habilitarEspecificarIdioma()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($idiomasmaterna as $idiomasmaterna)
                                                              <option value="{{ $idiomasmaterna->CODIGOPARAMETRODETALLE }}"
                                                                @if($idiomasmaterna->CODIGOPARAMETRODETALLE == Auth::user()->getDatosDatosPersonales(12))
                                                                        selected
                                                                      @endif>{{ $idiomasmaterna->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Seleccione el idioma o lengua materna.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">ESPECIFICAR</label>
                                                            <input type="text" class="form-control thresold-i" id="txtidiomamaternaespecificar" name="txtidiomamaternaespecificar" value="{{Auth::user()->getDatosDatosPersonales(13)}}" readonly required maxlength="255">
                                                            <div class="invalid-feedback">
                                                                Ingrese la especificacion del idioma o lengua materna.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">1.19. INSTITUCIÓN EDUCATIVA SECUNDARIA</label>
                                                            <input class="form-control thresold-i" id="txtinstitucioneducativa" type="text" name="txtinstitucioneducativa" value="{{Auth::user()->getDatosDatosPersonales(14)}}" maxlength="255" required>
                                                        <div class="invalid-feedback">
                                                            Ingrese su institucion educativa secundaria.
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">1.20. TIPO DE COLEGIO</label>
                                                            <select id="txttipocolegio" class="form-control" name="txttipocolegio" onchange="habilitarEspecificarTipoColegio()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipocolegios as $tipocolegios)
                                                              <option value="{{ $tipocolegios->CODIGOPARAMETRODETALLE }}"
                                                                @if($tipocolegios->CODIGOPARAMETRODETALLE == Auth::user()->getDatosDatosPersonales(15))
                                                                        selected
                                                                      @endif>{{ $tipocolegios->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione el tipo de colegio.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">ESPECIFICAR</label>
                                                            <input type="text" class="form-control thresold-i" id="txttipocolegioespecificar" name="txttipocolegioespecificar"  value="{{Auth::user()->getDatosDatosPersonales(16)}}" readonly required maxlength="255">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion del tipo de colegio.
                                                            </div>
                                                        </div>
                                                    </div>

                                                    </form>
                                                </div>
                                                <div id="step-2">
                                                    <h5>II. SITUACION FAMILIAR</h5>
                                                    <hr>
                                                    <div class="col-md-12 m-b-20">
                                                      <label style="color: black;font-weight: bold;">2.1. CUADRO FAMILIAR<label style="font-style:  oblique;">(Personas que actualmente viven con Ud.)</label></label>
                                                      <br>
                                                      <label style="font-style:  oblique;">De los miembros de mi familia (incluirse): </label>
                                                      <br>
                                                        <input type="button" value="Agregar Familiar" data-modal="modal-2" id="modaldatasituacionfamiliar" class="btn btn-info md-trigger">
                                                      </div>
                                                      <form class="needs-validation" method="post" id="form_paso2" name="form_paso3" novalidate>
                                                    <div class="dt-responsive table-responsive" style="margin-top: -30px;">
                                                      <table class="table table-striped table-bordered nowrap" style="width:100%" id="example3">
                                                      </table>
                                                  </div>
                                                </form>
                                                </div>
                                                <div id="step-3">
                                                  <form class="needs-validation" method="post" id="form_paso3" name="form_paso3" novalidate>
                                                    <h5>III. VIVIENDA - SERVICIOS BASICOS</h5>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">3.1. DIRECCION ACTUAL</label>
                                                            <input class="form-control thresold-i" id="txtdireccionactual" type="text" name="txtdireccionactual" maxlength = "255" value="{{Auth::user()->getDatosViviendaServiciosBasicos(1)}}" required>
                                                            <div class="invalid-feedback">
                                                              Ingrese la direccion actual.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">3.2. REFERENCIA DEL DOMICILIO</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtreferenciadomicilio" type="text" name="txtreferenciadomicilio" value="{{Auth::user()->getDatosViviendaServiciosBasicos(2)}}" required>
                                                            <div class="invalid-feedback">
                                                              Ingrese la referencia del domicilio.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label style="color: black;font-weight: bold;">3.3. TELEFONO</label>
                                                            <input class="form-control" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "9" id="txtnrotelefono" type="number" name="txtnrotelefono" value="{{Auth::user()->getDatosViviendaServiciosBasicos(3)}}" required>
                                                            <div class="invalid-feedback">
                                                              Ingrese el telefono.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">3.4. LOCALIZACION (ZONA DE UBICACION DE VIVIENDA ACTUAL)</label>
                                                            <select id="txtlocalizacion" class="form-control" name="txtlocalizacion" onchange="habilitarEspecificarLocalizacion()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($lugarProcedencia as $lugarProcedencia)
                                                              <option value="{{ $lugarProcedencia->CODIGOPARAMETRODETALLE }}" @if($lugarProcedencia->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(4))
                                                                      selected
                                                              @endif >{{ $lugarProcedencia->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione la localizacion.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFICAR</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificarlocalizacion" type="text" name="txtespecificarlocalizacion" value="{{Auth::user()->getDatosViviendaServiciosBasicos(5)}}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de la localizacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">3.5. SU VIVIENDA ES</label>
                                                            <select id="txtvivienda" class="form-control" name="txtvivienda" onchange="habilitarEspecificarvivienda()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($condicionVivienda as $condicionVivienda)
                                                              <option value="{{ $condicionVivienda->CODIGOPARAMETRODETALLE }}" @if($condicionVivienda->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(6))
                                                                      selected
                                                              @endif >{{ $condicionVivienda->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione la vivienda.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFICAR</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificarvivienda" type="text" name="txtespecificarvivienda"  value="{{Auth::user()->getDatosViviendaServiciosBasicos(7)}}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">3.6. ESTRUCTURA DE LA VIVIENDA</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.6.1. MATERIAL QUE PREDOMINA EN LAS PAREDES</label>
                                                                  <select id="txtviviendaparedes" class="form-control" name="txtviviendaparedes" required>
                                                                      <option value="">Seleccione</option>
                                                                      @foreach($materialParedes as $materialParedes)
                                                                      <option value="{{ $materialParedes->CODIGOPARAMETRODETALLE }}" @if($materialParedes->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(8))
                                                                      selected
                                                              @endif >{{ $materialParedes->DESCRIPCION }}</option>
                                                                      @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el material que predomina en las paredes.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.6.2. MATERIAL QUE PREDOMINA EN LOS TECHOS</label>
                                                                  <select id="txtviviendatechos" class="form-control" name="txtviviendatechos" required>
                                                                  <option value="">Seleccione</option>
                                                                  @foreach($materialTechos as $materialTechos)
                                                                      <option value="{{ $materialTechos->CODIGOPARAMETRODETALLE }}" @if($materialTechos->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(9))
                                                                      selected
                                                              @endif >{{ $materialTechos->DESCRIPCION }}</option>
                                                                  @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el material que predomina en los techos.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.6.3. MATERIAL QUE PREDOMINA EN LOS PISOS</label>
                                                                  <select id="txtviviendapisos" class="form-control" name="txtviviendapisos" required>
                                                                    <option value="">Seleccione</option>
                                                                     @foreach($materialPiso as $materialPiso)
                                                                      <option value="{{ $materialPiso->CODIGOPARAMETRODETALLE }}" @if($materialPiso->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(10))
                                                                      selected
                                                              @endif >{{ $materialPiso->DESCRIPCION }}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el material que predomina en los pisos.
                                                                  </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">3.7. SERVICIOS BASICOS</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.7.1. LUZ</label>
                                                                  <select id="txtserviciosluz" class="form-control" name="txtserviciosluz" required>
                                                                      <option value="">Seleccione</option>
                                                                      @foreach($servicioLuz as $servicioLuz)
                                                                        <option value="{{ $servicioLuz->CODIGOPARAMETRODETALLE }}" @if($servicioLuz->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(11))
                                                                      selected
                                                              @endif>{{ $servicioLuz->DESCRIPCION }}</option>
                                                                      @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione la luz.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.7.2. AGUA</label>
                                                                  <select id="txtserviciosagua" class="form-control" name="txtserviciosagua" required>
                                                                  <option value="">Seleccione</option>
                                                                  @foreach($servicioAgua as $servicioAgua)
                                                                        <option value="{{ $servicioAgua->CODIGOPARAMETRODETALLE }}" @if($servicioAgua->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(12))
                                                                      selected
                                                              @endif>{{ $servicioAgua->DESCRIPCION }}</option>
                                                                  @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione la agua.
                                                                  </div>
                                                              </div>
                                                              <div class="form-group col-md-4">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">3.7.3. DESAGUE</label>
                                                                  <select id="txtserviciosdesague" class="form-control" name="txtserviciosdesague" required>
                                                                    <option value="">Seleccione</option>
                                                                    @foreach($servicioDesague as $servicioDesague)
                                                                        <option value="{{ $servicioDesague->CODIGOPARAMETRODETALLE }}" @if($servicioDesague->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(13))
                                                                      selected
                                                              @endif>{{ $servicioDesague->DESCRIPCION }}</option>
                                                                    @endforeach
                                                                  </select>
                                                                  <div class="invalid-feedback">
                                                                    Seleccione el desague.
                                                                  </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;" class="mt-3">3.7.4. N° DE PERSONAS QUE HABITAN EN SU DOMICILIO</label>
                                                            <select id="txtnropersonasdomicilio" class="form-control" name="txtnropersonasdomicilio" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($personasDomicilio as $personasDomicilio)
                                                                <option value="{{ $personasDomicilio->CODIGOPARAMETRODETALLE }}" @if($personasDomicilio->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(14))
                                                                      selected
                                                              @endif>{{ $personasDomicilio->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;" class="mt-3">3.7.5. TOTAL, DE AMBIENTES CON LOS QUE CUENTA SU VIVIENDA</label>
                                                            <select id="txtnroambientevivienda" class="form-control" name="txtnroambientevivienda" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($ambientesVivienda as $ambientesVivienda)
                                                                <option value="{{ $ambientesVivienda->CODIGOPARAMETRODETALLE }}" @if($ambientesVivienda->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(15))
                                                                      selected
                                                              @endif>{{ $ambientesVivienda->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;" class="mt-3">3.7.6. TOTAL, DE DORMITORIOS EN SU VIVIENDA</label>
                                                            <select id="txtnrodormitoriovivienda" class="form-control" name="txtnrodormitoriovivienda" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($dormitoriosVivienda as $dormitoriosVivienda)
                                                                <option value="{{ $dormitoriosVivienda->CODIGOPARAMETRODETALLE }}" @if($dormitoriosVivienda->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(16))
                                                                      selected
                                                              @endif>{{ $dormitoriosVivienda->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label style="color: black;font-weight: bold;" class="mt-3">3.7.7. TOTAL, DE PERSONAS POR DORMITORIO</label>
                                                            <select id="txtnropersonasdormitorio" class="form-control" name="txtnropersonasdormitorio" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($personasDormitorio as $personasDormitorio)
                                                                <option value="{{ $personasDormitorio->CODIGOPARAMETRODETALLE }}" @if($personasDormitorio->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicos(17))
                                                                      selected
                                                              @endif>{{ $personasDormitorio->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                    </div>
                                                        <label style="color: black;font-weight: bold;" class="mt-3">3.7.8. SU HOGAR TIENE: (Puede marcar uno o más alternativas, de ser el caso) </label>
                                                        <br>
                                                         <div class="form-row">
                                                        @foreach($hogarTiene as $hogarTiene)
                                                        <div class="col-md-4">
                                                          <div class="checkbox checkbox-info d-inline">
                                                                <input type="checkbox"  class="custom-control-input" name="checkboxHogar{{ $hogarTiene->CODIGOPARAMETRODETALLE }}" id="checkboxHogar{{ $hogarTiene->CODIGOPARAMETRODETALLE }}" value="{{ $hogarTiene->CODIGOPARAMETRODETALLE }}" onchange="deshabilitarHogar()" required="" @if($hogarTiene->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicosDetalle(18,$hogarTiene->CODIGOPARAMETRODETALLE))
                                                                      checked
                                                              @endif>
                                                                <label for="checkboxHogar{{ $hogarTiene->CODIGOPARAMETRODETALLE }}" class="cr">{{ $hogarTiene->DESCRIPCION }}</label>
                                                                <div class="invalid-feedback">
                                                                  Seleccione una opcion como minimo.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        </div>
                                                        <label style="color: black;font-weight: bold;" class="mt-3">3.7.9. SERVICIOS COMPLEMENTARIOS: (Puede marcar uno o más alternativas, de ser el caso) </label>
                                                        <br>
                                                        <div class="form-row">
                                                        @foreach($servicioComplementario as $servicioComplementario)
                                                        <div class="col-md-4">
                                                          <div class="checkbox checkbox-info d-inline">
                                                                <input type="checkbox" class="custom-control-input" name="checkboxServicioC{{ $servicioComplementario->CODIGOPARAMETRODETALLE }}" id="checkboxServicioC{{ $servicioComplementario->CODIGOPARAMETRODETALLE }}" value="{{ $servicioComplementario->CODIGOPARAMETRODETALLE }}" required="" @if($servicioComplementario->CODIGOPARAMETRODETALLE == Auth::user()->getDatosViviendaServiciosBasicosDetalle(19,$servicioComplementario->CODIGOPARAMETRODETALLE))
                                                                      checked
                                                              @endif>
                                                                <label for="checkboxServicioC{{ $servicioComplementario->CODIGOPARAMETRODETALLE }}" class="cr">{{ $servicioComplementario->DESCRIPCION }}</label>
                                                                <div class="invalid-feedback">
                                                                  Seleccione una opcion como minimo.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        </div>
                                                    </form>
                                                </div>
                                                <div id="step-4">
                                                    <h5>IV. SITUACION ECONOMICA</h5>
                                                    <hr>
                                                    <form class="needs-validation" method="post" id="form_paso4" name="form_paso4" novalidate>
                                                      <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">4.1. INGRESO MENSUAL FAMILIAR: <label style="font-style: oblique">(Aproximado)</label></label>
                                                            <div class="dt-responsive table-responsive">
                                                              <table id="dtegresosmensual" class="table table-striped table-bordered nowrap">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>DESCRIPCION</th>
                                                                          <th>MONTO</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    @foreach($ingresoMensual as $ingresoMensualS)
                                                                      <tr>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametroIM" value="{{ $ingresoMensualS->CODIGOPARAMETRO }}"></td>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametrodetalleIM[{{ $ingresoMensualS->CODIGOPARAMETRODETALLE }}]" value="{{ $ingresoMensualS->CODIGOPARAMETRODETALLE }}">{{ $ingresoMensualS->CODIGOPARAMETRODETALLE }}</td>
                                                                          <td>{{ $ingresoMensualS->DESCRIPCION }}</td>
                                                                          <td>
                                                                              <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" class="form-control autonumber amt3" id="in" data-v-min="0.00" data-v-max="99999999.90" placeholder="0.00" name="txtmontoIngreso[{{ $ingresoMensualS->CODIGOPARAMETRODETALLE }}]" aria-describedby="inputGroupPrepend" required="" value="{{ Auth::user()->getDatosSituacionEconomicaDetalle(1,$ingresoMensualS->CODIGOPARAMETRO,$ingresoMensualS->CODIGOPARAMETRODETALLE) }}" maxlength="10">
                                                                                  <div class="invalid-feedback">
                                                                                      Ingrese el monto.
                                                                                  </div>
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                      @endforeach
                                                                      <tr>
                                                                        <td style="font-weight: bold;">TOTAL</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" class="form-control" id="txttotalingresomensual" name="txttotalingresomensual" placeholder="0.00" aria-describedby="inputGroupPrepend" required="" value="0.00" readonly="">
                                                                                  <div class="invalid-feedback">
                                                                                      Please choose a username.
                                                                                  </div>
                                                                              </div>
                                                                        </td>
                                                                    </tr>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">4.2. EGRESO MENSUAL FAMILIAR: <label style="font-style: oblique">(Aproximadamente)</label></label>
                                                            <div class="dt-responsive table-responsive">
                                                              <table id="dtegresosmensual" class="table table-striped table-bordered nowrap">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>DESCRIPCION</th>
                                                                          <th>MONTO</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    @foreach($egresoMensual as $egresoMensualS)
                                                                      <tr>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametroEM" value="{{ $egresoMensualS->CODIGOPARAMETRO }}"></td>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametrodetalleEM[{{ $egresoMensualS->CODIGOPARAMETRODETALLE }}]" value="{{ $egresoMensualS->CODIGOPARAMETRODETALLE }}">{{ $egresoMensualS->CODIGOPARAMETRODETALLE }}</td>
                                                                          <td>{{ $egresoMensualS->DESCRIPCION }}</td>
                                                                          <td>
                                                                              <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" class="form-control autonumber amt2" id="in" data-v-min="0.00" data-v-max="99999999.90" placeholder="0.00" name="txtmontoEgreso[{{ $egresoMensualS->CODIGOPARAMETRODETALLE }}]" aria-describedby="inputGroupPrepend" required="" value="{{ Auth::user()->getDatosSituacionEconomicaDetalle(1,$egresoMensualS->CODIGOPARAMETRO,$egresoMensualS->CODIGOPARAMETRODETALLE) }}" maxlength="10">
                                                                                  <div class="invalid-feedback">
                                                                                      Ingrese el monto.
                                                                                  </div>
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                      @endforeach
                                                                      <tr>
                                                                        <td style="font-weight: bold;">TOTAL</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" class="form-control" id="txttotalegresosmensual" name="txttotalegresosmensual" placeholder="0.00" aria-describedby="inputGroupPrepend" required="" value="{{ Auth::user()->getDatosSituacionEconomica(6) }}" readonly="">
                                                                                  <div class="invalid-feedback">
                                                                                      Please choose a username.
                                                                                  </div>
                                                                              </div>
                                                                        </td>
                                                                    </tr>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">4.3. SITUACIÓN ECONOMICA DEL ESTUDIANTE</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-12">
                                                                  <label style="color: black;font-weight: bold;" class="mt-3">4.3.1. UD. TRABAJA: <label style="font-style: oblique;">(En caso la respuesta sea NO, pase a la pregunta 4.3.3)</label> </label>
                                                                  <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarUstedTrabajaSI()" name="txttrabaja" required  class="custom-control-input" id="txttrabaja1" value="1"  @if( Auth::user()->getDatosSituacionEconomica(1)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txttrabaja1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txttrabaja" required onchange="habilitarUstedTrabajaSI()" class="custom-control-input" id="txttrabaja2" value="2" @if( Auth::user()->getDatosSituacionEconomica(1)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txttrabaja2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;margin-bottom: 15px;">4.3.2. CONDICIÓN LABORAL:</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-5">
                                                                <label style="font-style: oblique;color: black;font-weight: bold;"> (Si la respuesta es OTROS, especifique en el recuadro adjunto)</label>
                                                            <select id="txtcondicionlaboral" class="form-control" name="txtcondicionlaboral" disabled="" onchange="habilitCondicionLaboralEspecifique()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($condicionLaboral as $condicionLaboralS)
                                                                <option value="{{ $condicionLaboralS->CODIGOPARAMETRODETALLE }}" @if($condicionLaboralS->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSituacionEconomica(2))
                                                                      selected
                                                              @endif>{{ $condicionLaboralS->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione su condicion laboral.
                                                            </div>
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespcifiquecondicionlaboral" type="text" name="txtespcifiquecondicionlaboral"  value="{{ Auth::user()->getDatosSituacionEconomica(3) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su condicion laboral.
                                                            </div>
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;    margin-bottom: 15px;">4.3.3. CÓMO FINANCIA SUS ESTUDIOS:</label>
                                                            <div class="row" style="margin-top: -15px;">
                                                              <div class="form-group col-md-5">
                                                                <label style="font-style: oblique;color: black;font-weight: bold;"> (Si la respuesta es OTRA ENTIDADES, especifique en el recuadro adjunto)</label>
                                                            <select id="txtfinanciaestudios" class="form-control" name="txtfinanciaestudios" onchange="habilitFinaciaestudiosEspecifique()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($financiaEstudios as $financiaEstudiosS)
                                                                <option value="{{ $financiaEstudiosS->CODIGOPARAMETRODETALLE }}" @if($financiaEstudiosS->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSituacionEconomica(4))
                                                                      selected
                                                              @endif>{{ $financiaEstudiosS->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione como financia sus estudios.
                                                            </div>
                                                            </div>
                                                            <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespeicfiquefinanciaestudios" type="text" name="txtespeicfiquefinanciaestudios"  value="{{ Auth::user()->getDatosSituacionEconomica(5) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">4.3.4. GASTOS DIARIOS EN SUS ESTUDIOS:</label>
                                                            <div class="dt-responsive table-responsive">
                                                              <table id="dt-live-dom" class="table table-striped table-bordered nowrap">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>DESCRIPCION</th>
                                                                          <th>MONTO</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    @foreach($gastosDiarios as $gastosDiariosS)
                                                                      <tr>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametro" value="{{ $gastosDiariosS->CODIGOPARAMETRO }}"></td>
                                                                          <td hidden=""><input type="text" name="txtcodigoparametrodetalle[{{ $gastosDiariosS->CODIGOPARAMETRODETALLE }}]" value="{{ $gastosDiariosS->CODIGOPARAMETRODETALLE }}">{{ $gastosDiariosS->CODIGOPARAMETRODETALLE }}</td>
                                                                          <td>{{ $gastosDiariosS->DESCRIPCION }}</td>
                                                                          <td>
                                                                              <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" data-v-min="0.00" data-v-max="99999999.90" class="form-control autonumber amt" id="in" placeholder="0.00" name="txtmonto[{{ $gastosDiariosS->CODIGOPARAMETRODETALLE }}]" aria-describedby="inputGroupPrepend" required="" value="{{ Auth::user()->getDatosSituacionEconomicaDetalle(1,$gastosDiariosS->CODIGOPARAMETRO,$gastosDiariosS->CODIGOPARAMETRODETALLE) }}">
                                                                                  <div class="invalid-feedback">
                                                                                      Ingrese el monto.
                                                                                  </div>
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                      @endforeach
                                                                      <tr>
                                                                        <td style="font-weight: bold;">TOTAL</td>
                                                                        <td>
                                                                            <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" class="form-control" id="txttotalgastosdiarios" name="txttotalgastosdiarios" placeholder="0.00" aria-describedby="inputGroupPrepend" required="" value="{{ Auth::user()->getDatosSituacionEconomica(7) }}" readonly="">
                                                                                  <div class="invalid-feedback">
                                                                                      Please choose a username.
                                                                                  </div>
                                                                              </div>
                                                                        </td>
                                                                    </tr>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">4.3.5. OTROS GASTOS EN EDUCACION:</label>
                                                            <div class="dt-responsive table-responsive">
                                                              <table id="dt-live-dom" class="table table-striped table-bordered nowrap">
                                                                  <thead>
                                                                      <tr>
                                                                          <th>DESCRIPCION</th>
                                                                          <th>MONTO</th>
                                                                      </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                      <tr>
                                                                          <td>Educaciòn de cada miembro</td>
                                                                          <td>
                                                                              <div class="input-group">
                                                                                  <div class="input-group-prepend">
                                                                                      <span class="input-group-text" id="inputGroupPrepend">S/.</span>
                                                                                  </div>
                                                                                  <input type="text" data-v-min="0.00" data-v-max="99999999.90" class="form-control autonumber" id="txtmontoeducacionmiembro" placeholder="0.00" name="txtmontoeducacionmiembro" aria-describedby="inputGroupPrepend" required="" value="">
                                                                                  <div class="invalid-feedback">
                                                                                      Ingrese el monto.
                                                                                  </div>
                                                                              </div>
                                                                          </td>
                                                                      </tr>
                                                                  </tbody>
                                                              </table>
                                                          </div>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div id="step-5">
                                                  <form class="needs-validation" method="post" id="form_paso5" name="form_paso5" novalidate>
                                                    <h5>V. SALUD</h5>
                                                    <hr>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">5.1. CON QUE SEGURO CUENTA</label>
                                                            <select id="txtseguro" class="form-control" name="txtseguro" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($seguro as $seguro)
                                                                <option value="{{ $seguro->CODIGOPARAMETRODETALLE }}" @if($seguro->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(1))
                                                                      selected
                                                              @endif>{{ $seguro->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.2. HA PADECIDO UD. ALGUNA ENFERMEDAD:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.3., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarTipoEnfermedadSI()" name="txtpadecidoenfermedad" required  class="custom-control-input" id="txtpadecidoenfermedad1" value="1" @if( Auth::user()->getDatosSalud(2)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecidoenfermedad1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtpadecidoenfermedad" required onchange="habilitarTipoEnfermedadSI()" class="custom-control-input" id="txtpadecidoenfermedad2" value="2" @if( Auth::user()->getDatosSalud(2)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecidoenfermedad2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipoenferemedad" class="form-control" name="txttipoenferemedad" required disabled="" onchange="habilitarTipoEnfermedadEspecifique()">
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipoenfermedad as $tipoenfermedads)
                                                                <option value="{{ $tipoenfermedads->CODIGOPARAMETRODETALLE }}" @if($tipoenfermedads->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(3))
                                                                      selected
                                                              @endif>{{ $tipoenfermedads->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificartipoenfermedad" type="text" name="txtespecificartipoenfermedad"  value="{{ Auth::user()->getDatosSalud(4) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.3. UD. PADECE ACTUALMENTE ALGUNA ENFERMEDAD CRÓNICA:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.4., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarTipoEnfermedadCronicaSI()" name="txtpadecidoenfermedadcronica" required  class="custom-control-input" id="txtpadecidoenfermedadcronica1" value="1" @if( Auth::user()->getDatosSalud(5)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecidoenfermedadcronica1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtpadecidoenfermedadcronica" required onchange="habilitarTipoEnfermedadCronicaSI()" class="custom-control-input" id="txtpadecidoenfermedadcronica2" value="2" @if( Auth::user()->getDatosSalud(5)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecidoenfermedadcronica2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipoenferemedadcronica" class="form-control" name="txttipoenferemedadcronica" required onchange="habilitarTipoEnfermedadCronicaEspecifique()" disabled="">
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipoenfermedadcronica as $tipoenfermedadcronica)
                                                                <option value="{{ $tipoenfermedadcronica->CODIGOPARAMETRODETALLE }}" @if($tipoenfermedadcronica->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(6))
                                                                      selected
                                                              @endif>{{ $tipoenfermedadcronica->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificartipoenfermedadcronica" type="text" name="txtespecificartipoenfermedadcronica"  value="{{ Auth::user()->getDatosSalud(7) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.4. UD. PADECE ACTUALMENTE ALGUNA ENFERMEDAD INFECCIOSA:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.5., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarTipoEnfermedadInfecciosaSI()" name="txtpadecidoenfermedadinfecciosa" required  class="custom-control-input" id="txtpadecidoenfermedadinfecciosa1" value="1" @if( Auth::user()->getDatosSalud(8)==1)
                                                                      checked
                                                                    @endif >
                                                                    <label for="txtpadecidoenfermedadinfecciosa1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtpadecidoenfermedadinfecciosa" required onchange="habilitarTipoEnfermedadInfecciosaSI()" class="custom-control-input" id="txtpadecidoenfermedadinfecciosa2" value="2" @if( Auth::user()->getDatosSalud(8)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecidoenfermedadinfecciosa2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipoenferemedadinfecciosa" class="form-control" name="txttipoenferemedadinfecciosa" required disabled="" onchange="habilitarTipoEnfermedadInfecciosaEspecifique()">
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipoenfermedadinfecciosa as $tipoenfermedadinfecciosa)
                                                              <option value="{{ $tipoenfermedadinfecciosa->CODIGOPARAMETRODETALLE }}" @if($tipoenfermedadinfecciosa->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(9))
                                                                      selected
                                                              @endif>{{ $tipoenfermedadinfecciosa->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificartipoenfermedadinfecciosa" type="text" name="txtespecificartipoenfermedadinfecciosa"  value="{{ Auth::user()->getDatosSalud(10) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.5. UD. ES ALÉRGICO A ALGÚN MEDICAMENTO:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.6., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarMedicamentoSI()" name="txtalergicomedicamento" required  class="custom-control-input" id="txtalergicomedicamento1" value="1" @if( Auth::user()->getDatosSalud(11)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtalergicomedicamento1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtalergicomedicamento" required onchange="habilitarMedicamentoSI()" class="custom-control-input" id="txtalergicomedicamento2" value="2" @if( Auth::user()->getDatosSalud(11)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtalergicomedicamento2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipomedicamento" class="form-control" name="txttipomedicamento" required onchange="habilitarMedicamentoEspecifique()" disabled="">
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipomedicamentos as $tipomedicamentos)
                                                              <option value="{{ $tipomedicamentos->CODIGOPARAMETRODETALLE }}" @if($tipomedicamentos->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(12))
                                                                      selected
                                                              @endif>{{ $tipomedicamentos->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificartipomedicamento" type="text" name="txtespecificartipomedicamento"  value="{{ Auth::user()->getDatosSalud(13) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.6. USTED TIENE ANTECEDENTES QUIRÚRGICO:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.7., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitAntecedentesQuirurgicosSI()" name="txtantecedentesquirurgicos" required  class="custom-control-input" id="txtantecedentesquirurgicos1" value="1" @if( Auth::user()->getDatosSalud(14)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtantecedentesquirurgicos1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtantecedentesquirurgicos" required onchange="habilitAntecedentesQuirurgicosSI()" class="custom-control-input" id="txtantecedentesquirurgicos2" value="2" @if( Auth::user()->getDatosSalud(14)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtantecedentesquirurgicos2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipoantecedentesquirurgicos" class="form-control" name="txttipoantecedentesquirurgicos" required onchange="habilitarAntecedentesQuirurgicosEspecifique()" disabled="">
                                                              <option value="">Seleccione</option>
                                                              @foreach($tipoantecendentesquirurgico as $tipoantecendentesquirurgico)
                                                              <option value="{{ $tipoantecendentesquirurgico->CODIGOPARAMETRODETALLE }}" @if($tipoantecendentesquirurgico->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(15))
                                                                      selected
                                                              @endif>{{ $tipoantecendentesquirurgico->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiquetipoantecedentesquirurgicos" type="text" name="txtespecifiquetipoantecedentesquirurgicos"  value="{{ Auth::user()->getDatosSalud(16) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.7. USTED TIENE ALGÚN FAMILIAR QUE PADECE ALGUNA ENFERMEDAD:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.8., si la respuesta fuera SI, indique una de las alternativas, si su respuesta es OTRAS, especifique en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitEnfermedadFamiliarSI()" name="txtenfermerdadfamiliar" required  class="custom-control-input" id="txtenfermerdadfamiliar1" value="1" @if( Auth::user()->getDatosSalud(17)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtenfermerdadfamiliar1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtenfermerdadfamiliar" required onchange="habilitEnfermedadFamiliarSI()" class="custom-control-input" id="txtenfermerdadfamiliar2" value="2" @if( Auth::user()->getDatosSalud(17)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtenfermerdadfamiliar2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">INDIQUE CUAL</label>
                                                            <select id="txttipoenferemedadfamiliar" class="form-control" name="txttipoenferemedadfamiliar" required onchange="habilitEnfermedadFamiliarEspecifique()" disabled="">
                                                              <option value="">Seleccione</option>
                                                               @foreach($tipoenfermedad as $tipoenfermedadss)
                                                               <option value="{{ $tipoenfermedadss->CODIGOPARAMETRODETALLE }}" @if($tipoenfermedadss->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSalud(18))
                                                                      selected
                                                              @endif>{{ $tipoenfermedadss->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                              Seleccione.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txttespecifiquetipoenfernedadfamiliar" type="text" name="txttespecifiquetipoenfernedadfamiliar"  value="{{ Auth::user()->getDatosSalud(19) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.8. PADECE ALGÚN TIPO DE DISCAPACIDAD:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.9., si la respuesta fuera SI, especifique que tipo de discapacidad en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarTipoDiscapacidadSI()" name="txtpadecetipodiscapacidad" required  class="custom-control-input" id="txtpadecetipodiscapacidad1" value="1" @if( Auth::user()->getDatosSalud(20)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecetipodiscapacidad1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtpadecetipodiscapacidad" required onchange="habilitarTipoDiscapacidadSI()" class="custom-control-input" id="txtpadecetipodiscapacidad2" value="2" @if( Auth::user()->getDatosSalud(20)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtpadecetipodiscapacidad2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiquetipodiscapacidad" type="text" name="txtespecifiquetipodiscapacidad"  value="{{ Auth::user()->getDatosSalud(21) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion de su vivienda.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">5.9. SI ES MUJER, EN LA ACTUALIDAD SE ENCUENTRA UD. GESTANDO:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 5.11., si la respuesta fuera SI, indique ¿Cuál es tu ultima fecha de mestruacción?)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarActualidadGestandoSI()" name="txtactualidadgestando" disabled="" required  class="custom-control-input" id="txtactualidadgestando1" value="1" @if( Auth::user()->getDatosSalud(22)==1)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtactualidadgestando1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtactualidadgestando" required onchange="habilitarActualidadGestandoSI()" class="custom-control-input" id="txtactualidadgestando2" disabled="" value="2" @if( Auth::user()->getDatosSalud(22)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="txtactualidadgestando2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                                  <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                                  <input class="form-control" id="txtespecifiquefechamestruacion" type="text" name="txtespecifiquefechamestruacion" value="{{ Auth::user()->getDatosSalud(23) }}" required disabled="">
                                                                  <div class="invalid-feedback">
                                                                  Seleccione su fecha de nacimiento.
                                                                  </div>
                                                              </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                                  <label style="color: black;font-weight: bold;">5.10. SI SE ENCUENTRA UD. GESTANDO:<label style="font-style: oblique;">(Indique ¿Cuál es tu fecha probable de parto?)</label></label>
                                                                  <input class="form-control" id="txtespecifiquefechaprobableparto" type="text" name="txtespecifiquefechaprobableparto" value="{{ Auth::user()->getDatosSalud(24) }}" required disabled="">
                                                                  <div class="invalid-feedback">
                                                                  Seleccione su fecha de nacimiento.
                                                                  </div>
                                                              </div>
                                                    </div>
                                                    <label style="color: black;font-weight: bold;" class="mt-3">5.11. PROBLEMAS SOCIALES QUE SE PRESENTAN EN SU FAMILIA<label style="font-style: oblique;">(Si la respuesta es OTROS, especifique en el recuadro adjunto)</label> </label>
                                                    <br>
                                                         <div class="form-row">
                                                        @foreach($problemassociales as $problemassociales)
                                                        <div class="col-md-4">
                                                          <div class="checkbox checkbox-info d-inline">
                                                                <input type="checkbox"  class="custom-control-input" name="checkboxPS{{ $problemassociales->CODIGOPARAMETRODETALLE }}" id="checkboxPS{{ $problemassociales->CODIGOPARAMETRODETALLE }}" value="{{ $problemassociales->CODIGOPARAMETRODETALLE }}" onchange="deshabilitarOtrosProblemasSociales()" required="" @if( Auth::user()->getDatosSaludDetalle(25,$problemassociales->CODIGOPARAMETRODETALLE)==$problemassociales->CODIGOPARAMETRODETALLE)
                                                                      checked
                                                                    @endif>
                                                                <label for="checkboxPS{{ $problemassociales->CODIGOPARAMETRODETALLE }}" class="cr">{{ $problemassociales->DESCRIPCION }}</label>
                                                                <div class="invalid-feedback">
                                                                  Seleccione una opcion como minimo.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        </div>
                                                        <br>
                                                         <div class="form-row">
                                                        </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiqueproblemassociales" type="text" name="txtespecifiqueproblemassociales"  value="{{ Auth::user()->getDatosSalud(26) }}" required readonly="">
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                                <div id="step-6">
                                                    <h5>VI. ALIMENTACION</h5>
                                                    <hr>
                                                    <form class="needs-validation" method="post" id="form_paso6" novalidate>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">6.1. DONDE INGIERE SUS ALIMENTOS:</label><label style="color: black;font-style: oblique;font-weight: bold;">(Si la respuesta es OTRO, especifique en el recuadro adjunto)</label>
                                                            <br>
                                                            <div class="form-row">
                                                              @foreach($ingieresalimentos  as $ingieresalimentos )
                                                              <div class="col-md-3">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="radioIA" id="radio-s-an-{{ $ingieresalimentos->CODIGOPARAMETRODETALLE }}" value="{{ $ingieresalimentos->CODIGOPARAMETRODETALLE }}" onchange="habilitarEspecificarIngiereAlimentos()" required  class="custom-control-input"  @if($ingieresalimentos->CODIGOPARAMETRODETALLE == Auth::user()->getDatosAlimentacion(1))
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-s-an-{{ $ingieresalimentos->CODIGOPARAMETRODETALLE }}" class="cr">{{ $ingieresalimentos->DESCRIPCION }}</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione donde se ingiere sus alimentos.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                               @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtingenierealimentosespecificar" type="text" name="txtingenierealimentosespecificar" value="{{Auth::user()->getDatosAlimentacion(2)}}" readonly required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el especifique.
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                                <div id="step-7">
                                                    <h5>VII. SOCIOCULTURAL - DEPORTIVO</h5>
                                                    <hr>
                                                    <form class="needs-validation" method="post" id="form_paso7" novalidate>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">7.1. A QUE RELIGION PERTENECE:</label>
                                                            <select id="txtreligion" class="form-control" name="txtreligion" onchange="habilitarEspecificarReligion()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($religionPertenece as $religionPertenece)
                                                              <option value="{{ $religionPertenece->CODIGOPARAMETRODETALLE }}" @if($religionPertenece->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSocioCultural(1))
                                                                      selected
                                                                    @endif> {{ $religionPertenece->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Seleccione la religion.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecificarreligion" type="text" name="txtespecificarreligion" value="{{Auth::user()->getDatosSocioCultural(2)}}" readonly required>
                                                            <div class="invalid-feedback">
                                                                Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">7.2. PRACTICA ALGUNA DISCIPLINA DEPORTIVA</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtpracticadisciplinadeportiva" type="text" name="txtpracticadisciplinadeportiva" value="{{Auth::user()->getDatosSocioCultural(3)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese la practica alguna disciplina deportiva.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">7.3. PRACTICA ALGUNA DISCIPLINA ARTÍSTICA</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtpracticadisciplinaartistica" type="text" name="txtpracticadisciplinaartistica" value="{{Auth::user()->getDatosSocioCultural(4)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese la practica alguna disciplina artistica.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label style="color: black;font-weight: bold;">7.4. A QUÉ SE DEDICA EN SUS RATOS LIBRES</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtratoslibres" type="text" name="txtratoslibres" value="{{Auth::user()->getDatosSocioCultural(5)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese a que se dedica en sus ratos libres.
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                                <div id="step-8">
                                                    <h5>VIII. OTROS ASPECTOS RELEVANTES</h5>
                                                    <hr>
                                                    <form class="needs-validation" method="post" id="form_paso8" novalidate>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">8.1. MEDIO DE TRANSPORTE QUE UTILIZA PARA ASISTIR A LA UNIVERSIDAD<label style="font-style: oblique;">(Si la respuesta es OTRO, especifique en el recuadro adjunto)</label></label>
                                                            <select id="txtmediotransporte" class="form-control" name="txtmediotransporte" onchange="habilitarEspecificarMedioTransporte()" required >
                                                              <option value="">Seleccione</option>
                                                              @foreach($medioTransporte as $medioTransporte)
                                                              <option value="{{ $medioTransporte->CODIGOPARAMETRODETALLE }}" @if($medioTransporte->CODIGOPARAMETRODETALLE == Auth::user()->getDatosOtrosAspectosRelevantes(1))
                                                                      selected
                                                                    @endif > {{ $medioTransporte->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                seleccione el medio de trasnporte.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <br>
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtmediotransportespecifique" type="text" name="txtmediotransportespecifique" value="{{Auth::user()->getDatosOtrosAspectosRelevantes(2)}}" readonly required>
                                                            <div class="invalid-feedback">
                                                                Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">8.2. QUE TIEMPO DEMORA, LLEGAR A LA UNIVERSIDAD DESDE SU DOMICILIO</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txttiempodemora" type="text" name="txttiempodemora" value="{{Auth::user()->getDatosOtrosAspectosRelevantes(3)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el tiempo de demora.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">8.3. CUENTA CON CELULAR<label style="font-style: oblique;">(En caso su respuesta sea NO, pase a la pregunta 8.4., si la respuesta fuera SI, especifique el monto que paga en el recuadro adjunto)</label></label>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" class="custom-control-input" value="1" name="txtcuentacelular" id="radio-s-in-1" required onchange="habilitarCuentacelularNo()" @if(Auth::user()->getDatosOtrosAspectosRelevantes(4)== 1)
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-s-in-1" class="cr">Si</label>
                                                                    <div class="invalid-feedback">
                                                                    Seleccione una opcion.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" class="custom-control-input" value="2" name="txtcuentacelular" id="radio-s-in-2" required onchange="habilitarCuentacelularNo()" @if(Auth::user()->getDatosOtrosAspectosRelevantes(4) == 2)
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-s-in-2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                    Seleccione una opcion.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">PAGO POR EL SERVICIO</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtpagoservicio" type="text" name="txtpagoservicio" value="{{Auth::user()->getDatosOtrosAspectosRelevantes(5)}}" required readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">8.4. ES BENEFICIARIO DE ALGÚN PROGRAMA DEL ESTADO<label style="font-style: oblique;">(Si la respuesta es OTRO, especifique en el recuadro adjunto)</label></label>
                                                            <select id="txtbeneficiario" class="form-control" name="txtbeneficiario" onchange="habilitarBenefeciariorNo()" required >
                                                              <option value="">Seleccione</option>
                                                              @foreach($beneficiarioPrograma as $beneficiarioPrograma)
                                                              <option value="{{ $beneficiarioPrograma->CODIGOPARAMETRODETALLE }}" @if($beneficiarioPrograma->CODIGOPARAMETRODETALLE == Auth::user()->getDatosOtrosAspectosRelevantes(6))
                                                                      selected
                                                              @endif > {{ $beneficiarioPrograma->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                    Seleccione una opcion.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiquebeneficiario" type="text" name="txtespecifiquebeneficiario" value="{{Auth::user()->getDatosOtrosAspectosRelevantes(7)}}" required readonly>
                                                            <div class="invalid-feedback">
                                                                Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                                <div id="step-9">
                                                    <h5>IX. SITUACION ACADEMICA</h5>
                                                    <hr>
                                                    <form class="needs-validation" method="post" id="form_paso9" novalidate>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">9.1. CONDICIÓN ACTUAL DEL ESTUDIANTE</label>
                                                            <select id="txtcondicionestudiante" class="form-control" name="txtcondicionestudiante" onchange="habilitarEspecificarTipoColegio()" required>
                                                              <option value="">Seleccione</option>
                                                              @foreach($condicionEstudiante as $condicionEstudiante)
                                                              <option value="{{ $condicionEstudiante->CODIGOPARAMETRODETALLE }}" @if($condicionEstudiante->CODIGOPARAMETRODETALLE == Auth::user()->getDatosSituacionAcademica(1))
                                                                      selected
                                                                    @endif > {{ $condicionEstudiante->DESCRIPCION }}</option>
                                                              @endforeach
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Seleccione la condicion atual del estudiante.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">9.2. PROMEDIO PONDERADO DEL ULTIMO SEMESTRE ACADÉMICO</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtpromedioponderado" type="text" name="txtpromedioponderado" value="{{Auth::user()->getDatosSituacionAcademica(2)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese el promedio ponderado.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label style="color: black;font-weight: bold;">9.3. CURSOS DESAPROBADOS EN EL ULTIMO SEMESTRE ACADÉMICO</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtcursosdesaprobados" type="text" name="txtcursosdesaprobados" value="{{Auth::user()->getDatosSituacionAcademica(3)}}" required>
                                                            <div class="invalid-feedback">
                                                                Ingrese los cursos desaprobados.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">9.4. ESTUDIA EN OTRA UNIVERSIDAD SIMULTANEAMENTE: <label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 9.5., si la respuesta fuera SI, especifique en que otra institución sigues sus estudios, en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtestudiaotrauniversidad" onchange="habilitarEstudiaUnviversidadNo()" required class="custom-control-input" id="radio-x-in-1" value="1" @if(Auth::user()->getDatosSituacionAcademica(4)==1)
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-x-in-1" class="cr">Si</label>
                                                                    <div class="invalid-feedback">
                                                                        Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtestudiaotrauniversidad" onchange="habilitarEstudiaUnviversidadNo()" required class="custom-control-input" id="radio-x-in-2" value="2" @if(Auth::user()->getDatosSituacionAcademica(4)==2)
                                                                      checked
                                                                    @endif>
                                                                    <label for="radio-x-in-2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                        Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiqueotrauniversidad" type="text" name="txtespecifiqueotrauniversidad" value="{{Auth::user()->getDatosSituacionAcademica(5)}}" required readonly>
                                                            <div class="invalid-feedback">
                                                              Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-5">
                                                            <label style="color: black;font-weight: bold;">9.5. SIMULTANEAMENTE SIGUE OTROS ESTUDIOS COMPLEMENTARIOS:<label style="font-style: oblique;">(En caso su respuesta sea NO, pase la pregunta 9.6., si la respuesta fuera SI, especifique en que otra institución sigues sus estudios, en el recuadro adjunto)</label></label>
                                                            <br>
                                                            <div class="form-row">
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" onchange="habilitarOtrosEstudiosNo()" name="txtotrosestudios" required  class="custom-control-input" id="radio-s-n-1" value="1" @if(Auth::user()->getDatosSituacionAcademica(6)==1)
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-s-n-1" class="cr" >Si</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                  </div>
                                                              </div>
                                                              <div class="col-md-6">
                                                                  <div class="form-group d-inline">
                                                                <div class="radio radio-info d-inline">
                                                                    <input type="radio" name="txtotrosestudios" required onchange="habilitarOtrosEstudiosNo()" class="custom-control-input" id="radio-s-n-2" value="2" @if(Auth::user()->getDatosSituacionAcademica(6)==2)
                                                                      checked
                                                                    @endif >
                                                                    <label for="radio-s-n-2" class="cr">No</label>
                                                                    <div class="invalid-feedback">
                                                                      Seleccione una opcion Si o No.
                                                                    </div>
                                                                </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-7">
                                                            <label style="color: black;font-weight: bold;">ESPECIFIQUE</label>
                                                            <input class="form-control thresold-i" maxlength = "255" id="txtespecifiqueotrosestudios" type="text" name="txtespecifiqueotrosestudios" value="{{Auth::user()->getDatosSituacionAcademica(7)}}" required readonly>
                                                            <div class="invalid-feedback">
                                                                Ingrese la especificacion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">9.6. PRINCIPAL MOTIVO POR EL QUE ELIGÍO LA UNAB</label>
                                                            <textarea class="form-control max-textarea" maxlength = "255" id="txtmotivoeligiounab" type="text" name="txtmotivoeligiounab" value="" required>{{Auth::user()->getDatosSituacionAcademica(8)}}</textarea>
                                                            <div class="invalid-feedback">
                                                                Ingrese el motivo por el que eligio la unab.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">9.7. PRINCIPAL MOTIVO POR EL QUE ELIGÍO LA PROFESIÓN QUE ESTUDIA</label>
                                                            <textarea class="form-control max-textarea" maxlength = "255" id="txtmotivoeligioprofesion" type="text" name="txtmotivoeligioprofesion" value="" required>{{Auth::user()->getDatosSituacionAcademica(9)}}</textarea>
                                                            <div class="invalid-feedback">
                                                                Ingrese motivo por el que eligio la profesion.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                       <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">9.8. SI FUERA EL CASO; QUE ABADONÓ SUS ESTUDIOS UNIVERSITARIOS, ESPECIFIQUE EL MOTIVO EN EL RRECUADRO ADJUNTO</label>
                                                            <textarea class="form-control max-textarea" maxlength = "255" id="txtabandono" type="text" name="txtabandono" value="" required>{{Auth::user()->getDatosSituacionAcademica(10)}}</textarea>
                                                            <div class="invalid-feedback">
                                                                Ingrese el motivo.
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label style="color: black;font-weight: bold;">9.9. SEGÚN UD. QUE DEBERÍA IMPLEMENTAR LA UNIVERSIDAD</label>
                                                            <textarea class="form-control max-textarea" maxlength = "255" id="txtimplementaruniversidad" type="text" name="txtimplementaruniversidad" value=""  required>{{Auth::user()->getDatosSituacionAcademica(11)}}</textarea>
                                                            <div class="invalid-feedback">
                                                                Ingrese que se deberia implementar en la universidad.
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="md-modal md-effect-8" id="modal-2" style="height: 100%;overflow-x: hidden;overflow-y: auto;">
    <div class="md-content" style="background: #c9ccd0;">
      <h3 class="bg-primary" id="titulomodal">AGREGAR DATOS DEL FAMILIAR</h3>
      <div>
        <form id="form_familiar">
        <div class="form-row">
          <input type="text" class="form-control" id="txtcodigoitem" style="display: none" name="txtcodigoitem" placeholder="">
          <div class="form-group col-md-12">
                  <label for="inputEmail4" style="color: black;font-weight: bold;">Apellidos y Nombres</label>
                  <input type="text" class="form-control" id="txtapellidosnombresfamiliar" name="txtapellidosnombresfamiliar" required="" placeholder="">
                  <div class="invalid-feedback">
                    Ingrese los apellidos y nombres.
                  </div>
              </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-6">
                  <label for="inputEmail12" style="color: black;font-weight: bold;">Parentesco</label>
                  <select id="txtparentescofamiliar" class="form-control" name="txtparentescofamiliar" onchange="" required>
                    <option value="">Seleccione</option>
                    @foreach($parentesco as $parentescoSe)
                    <option value="{{ $parentescoSe->CODIGOPARAMETRODETALLE }}"> {{ $parentescoSe->DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Seleccione el parentesco.
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword422" style="color: black;font-weight: bold;margin-bottom: 17px;">Sexo</label>
                  <br>
                  <div class="form-group d-inline">
                      <div class="radio radio-primary d-inline">
                          <input type="radio" class="custom-control-input" name="radioSexoFamiliar" id="radioSexoFamiliar5" onchange="" value="1" required="">
                          <label for="radioSexoFamiliar5" class="cr" style="color:black;">Masculino</label>
                      </div>
                  </div>
                  <div class="form-group d-inline">
                      <div class="radio radio-primary d-inline">
                          <input type="radio" class="custom-control-input" name="radioSexoFamiliar" id="radioSexoFamiliar6" onchange="" value="2" required="">
                          <label for="radioSexoFamiliar6" class="cr" style="color:black;">Femenino</label>
                          <div class="invalid-feedback">
                          <center>
                          Seleccione masculino o femenino.
                          </center>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="form-row">
          <div class="form-group col-md-2">
                  <label for="inputEmail4" style="color: black;font-weight: bold;">Edad</label>
                  <input type="number" class="form-control" id="txtedadfamiliar" name="txtedadfamiliar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="3" placeholder="" required="">
                  <div class="invalid-feedback">
                    Ingrese su edad.
                  </div>
              </div>
              <div class="form-group col-md-5">
                  <label for="inputPassword4"style="color: black;font-weight: bold;" >Estado Civil</label>
                  <select id="txtestadocivilfamiliar" class="form-control" name="txtestadocivilfamiliar" onchange="" required>
                    <option value="">Seleccione</option>
                    @foreach($estadocivils as $estadocivilsSe)
                    <option value="{{ $estadocivilsSe->CODIGOPARAMETRODETALLE }}"> {{ $estadocivilsSe->DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Seleccione el estado civil.
                  </div>
              </div>
              <div class="form-group col-md-5">
                  <label for="inputEmail4" style="color: black;font-weight: bold;">Grado de Instruccion</label>
                  <select id="txtgradoinstruccionfamiliar" class="form-control" name="txtgradoinstruccionfamiliar" onchange="" required>
                    <option value="">Seleccione</option>
                    @foreach($gradoInstruccionJefe as $gradoInstruccionJefes)
                    <option value="{{ $gradoInstruccionJefes->CODIGOPARAMETRODETALLE }}"> {{ $gradoInstruccionJefes->DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Seleccione el grado de instruccion.
                  </div>
              </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
                  <label for="inputPassword4" style="color: black;font-weight: bold;">Ocupacion</label>
                  <select id="txtocupacionfamiliar" class="form-control" name="txtocupacionfamiliar" onchange="" required>
                    <option value="">Seleccione</option>
                    @foreach($ocupacion as $ocupaciond)
                    <option value="{{ $ocupaciond->CODIGOPARAMETRODETALLE }}"> {{ $ocupaciond->DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Seleccione la ocupacion.
                  </div>
              </div>
              <div class="form-group col-md-6">
                  <label for="inputPassword4" style="color: black;font-weight: bold;">Condicion Trabajo</label>
                  <select id="txtcondicionlaboralfamiliar" class="form-control" name="txtcondicionlaboralfamiliar" onchange="" required>
                    <option value="">Seleccione</option>
                    @foreach($condicionLaboralFamiliar as $condicionLaboralFamiliars)
                    <option value="{{ $condicionLaboralFamiliars->CODIGOPARAMETRODETALLE }}"> {{ $condicionLaboralFamiliars->DESCRIPCION }}</option>
                    @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Seleccione la condicion de trabajo.
                  </div>
              </div>
          </div>
          </form>
        <br>
        <div class="form-row">
          <div class="form-group col-md-6">
            <button class="btn btn-primary md-close2" id="btnguardarfamiliar">Guardar</button>
          </div>
          <div class="form-group col-md-6">
            <button class="btn btn-danger md-close">Cancelar</button>
          </div>
        </div>

      </div>
    </div>
  </div>

@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/data-tables/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/modal-window-effects/css/md-modal.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/pnotify/css/pnotify.custom.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/pnotify.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/smart-wizard/css/smart_wizard.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/smart-wizard/css/smart_wizard_theme_arrows.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/smart-wizard/css/smart_wizard_theme_circles.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/smart-wizard/css/smart_wizard_theme_dots.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput-latest/css/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-datetimepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{ asset('fonts/material/css/materialdesignicons.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/mini-color/css/jquery.minicolors.css') }}">
<link rel="stylesheet" href="{{ asset('css/pages/pages.css') }}">
@endsection

@section('js')
<script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/modal-window-effects/js/classie.js') }}"></script>
<script src="{{ asset('plugins/pnotify/js/pnotify.custom.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('plugins/smart-wizard/js/jquery.smartWizard.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-maxlength/js/bootstrap-maxlength.min.js') }}"></script>
<script src="{{ asset('js/moment-with-locales.min.js') }}"></script>
<script src="{{ asset('plugins/material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('plugins/inputmask/js/inputmask.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/js/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('plugins/inputmask/js/autoNumeric.js') }}"></script>
<script src="{{ asset('plugins/editable/js/jquery.tabledit.js') }}"></script>
<script src="{{ asset('js/myjs/proceso/JS_FSE300.js') }}"></script>
@endsection
