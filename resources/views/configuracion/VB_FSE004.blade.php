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
                                                <h5 class="m-b-10">Procesos -Escuela</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/configuracion/procesos-escuela') }}">Procesos - Escuela</a></li>
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
                                            <h5>Boton de Accion :</h5>
                                            <button class="btn btn-success" id="btnNuevo" name="btnNuevo" type="button"><i class="feather icon-plus"></i>Nuevo</button>
                                            </center>
                                            <div class="card-header-right">
                                                <div class="btn-group card-option">
                                                    <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="feather icon-more-horizontal"></i>
                                                    </button>
                                                    <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                        <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> Maximizar</span><span style="display:none"><i class="feather icon-minimize"></i> Restaurar</span></a></li>
                                                        <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> Reducir</span><span style="display:none"><i class="feather icon-plus"></i> Expandir</span></a></li>
                                                        <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> Recargar</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                        <form class="needs-validation" method="post" id="user_form" novalidate>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="validationCustom01">PROCESO</label>
                                                    <div class="input-group mb-3">
                                                      <input type="text" style="display: none;" id="txtcodigoprocesoescuela" name="txtcodigoprocesoescuela" class="form-control">
                                                      <input type="text" style="display: none;" id="txtcodigosemestre" name="txtcodigosemestre" class="form-control">
                                                      <select id="txtcodigoproceso" class="form-control" name="txtcodigoproceso" required>
                                                        <option value="">Buscar</option>
                                                    </select>
                                                      <div class="input-group-append">
                                                        <button title="Buscar" id="modaldataproceso" class="btn btn-primary md-trigger" data-modal="modal-2" type="button"><center><i class="feather icon-search"></i></center></button>
                                                      </div>
                                                      <div class="invalid-feedback">
                                                          Seleccione el Proceso.
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-3">               
                                                  <label for="validationCustom02">ESCUELA</label>
                                                    <div class="input-group mb-3">
                                                    <select id="txtcodigoescuela" class="form-control" name="txtcodigoescuela" required>
                                                        <option value="">Buscar</option>
                                                    </select>
                                                    <div class="input-group-append">
                                                        <button title="Buscar" id="modaldataescuela" class="btn btn-primary md-trigger" data-modal="modal-3" type="button"><center><i class="feather icon-search"></i></center></button>
                                                      </div>
                                                    <div class="invalid-feedback">
                                                        Seleccione la escuela.
                                                    </div>
                                                  </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">FECHA INICIO</label>
                                                    <input type="date" id="txtfechainicio" name="txtfechainicio" class="form-control" id="validationCustom01" placeholder="First name" required>
                                                    <div class="invalid-feedback">
                                                        Seleccione la fecha inicio.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom02">FECHA FIN</label>
                                                    <input type="date" id="txtfechafin" name="txtfechafin" class="form-control" id="validationCustom02" placeholder="Last name" required>
                                                    <div class="invalid-feedback">
                                                        Seleccione la fecha fin.
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustomUsername">ESTADO</label>
                                                    <div class="input-group">
                                                        <select id="txtestado" class="form-control" name="txtestado" required>
                                                          <option value="">Seleccione</option>
                                                          @foreach($estados as $estados)
                                                            <option value="{{ $estados->CODIGOPARAMETRODETALLE }}">{{ $estados->DESCRIPCION }}</option>
                                                          @endforeach
                                                        </select>
                                                        <div class="invalid-feedback">
                                                            Seleccione el estado.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <center>
                                            <button class="btn btn-primary sweet-success" id="btnGuardarDatos" name="btnGuardarDatos" type="submit"><i class="feather icon-check-circle"></i>Guardar</button>
                                            </center>
                                        </form>
                                    </div>
                                        <!--</div>-->
                                    </div>
                                    
                                </div>
                                <!-- [ dark-layout ] end -->
                            </div>

                            <div class="row">
                                <!-- [ dark-layout ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-header" style="margin-bottom: -40px;">
                                            <h5>Listado de Procesos - Escuela</h5>
                                            <br>
                                            <br>
                                            <ul class="nav navbar-right panel_toolbox">
                                              <li style="margin-right: 15px;margin-top: 10px;">
                                                <h5> Filtros de busqueda:</h5>
                                              </li>
                                              <li style="margin-right: 15px;margin-top: 10px;">
                                                <h5> Procesos</h5>
                                              </li>
                                              <li style="margin-right: 15px;">
                                              <select id="txtprocesobuscar" onchange="consultar()" class="form-control" name="txtprocesobuscar" required>
                                                  <option value="0">Seleccione</option>
                                                  @foreach($procesos as $procesos)
                                                  <option value="{{ $procesos->CODIGOPROCESO }}">{{ $procesos->DESCRIPCIONSEMESTRE }}</option>
                                                  @endforeach
                                              </select>
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
              <input type="text" readonly="" class="form-control" id="txtcodigoprocesoescuelaE" name="txtcodigoprocesoescuelaE" />
            </div>
            <div class="form-group"  style="display: block;">               
              <label for="exampleInputEmail1">
                CODIGOPROCESO : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigoprocesoE" name="txtcodigoprocesoE" />
            </div>
            <div class="form-group"  style="display: block;">               
              <label for="exampleInputEmail1">
                CODIGOSEMESTRE : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigosemestreE" name="txtcodigosemestreE" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                PROCESO : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtsemestreE" name="txtsemestreE" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                CODIGOESCUELA : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigoescuelaE" name="txtcodigoescuelaE" />
            </div> 
            <div class="form-group">               
              <label for="exampleInputPassword1">
                ESCUELA : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtescuelaE" name="txtescuelaE" />
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

  <div class="md-modal md-effect-2" id="modal-2">
    <div class="md-content" style="background: #c9ccd0;">
       
      <h3 class="bg-primary">LISTADO DE PROCESO</h3>
      <div>
        <table id="res-config2" class="table table-bordered display table table-striped table-hover dt-responsive nowrap" style="width:100%">
        </table>
        <button class="btn btn-primary md-close">Cancelar</button>
      </div>
    </div>
  </div>
  <div class="md-modal md-effect-2" id="modal-3">
    <div class="md-content" style="background: #c9ccd0;">
       
      <h3 class="bg-primary">LISTADO DE ESCUELA</h3>
      <div>
        <table id="res-config3" class="table table-bordered display table table-striped table-hover dt-responsive nowrap" style="width:100%">
        </table>
        <button class="btn btn-primary md-close">Cancelar</button>
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
<script src="{{ asset('js/myjs/configuracion/JS_FSE004.js') }}"></script>
@endsection