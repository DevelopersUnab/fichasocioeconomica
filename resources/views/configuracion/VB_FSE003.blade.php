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
                                                <h5 class="m-b-10">Proceso</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/configuracion/proceso') }}">Proceso</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ breadcrumb ] end -->
                            <!-- [ Main Content ] start -->
                            

                            <div class="row">
                                <!-- [ dark-layout ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Listado de Procesos</h5>
                                            <br>
                                            <br>
                                            <ul class="nav navbar-right panel_toolbox">
                                              <li style="margin-right: 15px;margin-top: 10px;">
                                                <h5> Botones de Acciones:</h5>
                                              </li>
                                              <li style="margin-right: 15px;">
                                              <button id="btnNuevo"  type="button" class="navbar-right btn btn-success"  data-toggle="modal" data-target="#myModalVentana">
                                                <span class="fa fa-plus"></span> Nuevo
                                              </button>
                                              </li>
                                            </ul>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Restaurar</span></a></li>
                                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> Reducir</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                                                        <li id="btnResfrecar" class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> Recargar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                          <div id="alertSuccess" style="display: none;"  class="alert alert-success" role="alert">
                                              <p id="mensajeSuccess"></p>
                                          </div>
                                          <div id="alertDanger" style="display: none;"  class="alert alert-danger" role="alert">
                                              <p id="mensajeDanger"></p>
                                          </div>
                                            <h6 style="display: none" id="message"></h6>
                                            <!--<div class="x_content">-->
                                                <table id="res-config" class="table table-bordered display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                </table>
                                            </div>
                                        <!--</div>-->
                                    </div>
                                    
                                </div>
                                <!-- [ dark-layout ] end -->
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div id="myModalVentana" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog" role="document"> 
    <form method="post" id="user_form" class="needs-validation" novalidate> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">          
          <h5 class="modal-title">Mantenimiento de Procesos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group">               
              <label for="exampleInputEmail1">
                CODIGO : 
              </label>
              <input type="text" class="form-control" id="txtcodigo" name="txtcodigo" readonly="" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                SEMESTRE : 
              </label>
              <select id="txtsemestre" class="form-control" name="txtsemestre" required>
                  <option value="">Seleccione</option>
                  @foreach($semestres as $semestres)
                    <option value="{{ $semestres->CODIGOSEMESTRE }}">{{ $semestres->SEMESTRE }}</option>
                  @endforeach
              </select>
              <div class="invalid-feedback">
                Seleccione el Semestre.
              </div>
            </div>            
            <div class="form-group">               
              <label for="exampleInputPassword1">
                NOMBRE DEL AÑO : 
              </label>
              <textarea type="text" class="form-control" rows="3" id="txtnombreanio" name="txtnombreanio" maxlength="300" required=""></textarea>
              <div class="invalid-feedback">
                Ingrese el nombre del año.
              </div>
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                FECHA INICIO : 
              </label>
              <input type="date" class="form-control" id="txtfechainicio" name="txtfechainicio" aria-describedby="inputSuccess2Status2" required>
              <div class="invalid-feedback">
                Ingrese la Fecha Inicio.
              </div>
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                FECHA FIN : 
              </label>
              <input type="date" class="form-control" id="txtfechafin" name="txtfechafin" aria-describedby="inputSuccess2Status2" required>
              <div class="invalid-feedback">
                Ingrese la Fecha Fin.
              </div>
            </div>
            <div class="form-group" style="display: none;">               
              <label for="exampleInputPassword1">
                ESTADO : 
              </label>
              <select id="txtestado" class="form-control" name="txtestado">
                  <option value="">Seleccione</option>
                  @foreach($estados as $estados)
                    <option value="{{ $estados->CODIGOPARAMETRODETALLE }}">{{ $estados->DESCRIPCION }}</option>
                  @endforeach
                </select>
              <div class="invalid-feedback">
                Seleccione el Estado.
              </div>
            </div>         
        </div>      
        <div id="alertDuplicadoS" style="display: none;" role="alert">
            <p id="mensajeDuplicadoS"></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="btnGuardar" class="btn btn-primary"">Guardar</button>
        </div>
        </div>
      </form>
      </div>
      
    </div>

  <div id="myModalEliminar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"> 
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Desea eliminar este registro?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <div class="form-group" >               
              <label for="exampleInputEmail1">
                CODIGO : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigoE" name="txtcodigoE" />
            </div>
            <div class="form-group"  style="display: none">               
              <label for="exampleInputEmail1">
                CODIGOSEMESTRE : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigosemestreE" name="txtcodigosemestreE" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                SEMESTRE : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtsemestreE" name="txtsemestreE" />
            </div>          
        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
            <button type="submit" id="btnEliminarE" name="btnEliminar" class="btn btn-danger">Eliminar</button>
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
@endsection

@section('js')
<script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/modal-window-effects/js/classie.js') }}"></script>
<script src="{{ asset('plugins/pnotify/js/pnotify.custom.min.js') }}"></script>
<script src="{{ asset('plugins/sweetalert/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/myjs/configuracion/JS_FSE003.js') }}"></script>
@endsection