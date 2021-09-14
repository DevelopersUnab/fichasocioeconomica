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
                                                <h5 class="m-b-10">Parametros Detalle</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/configuracion/parametrosDetalle') }}">Parametros Detalle</a></li>
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
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">PARAMETRO</label>
                                                    <div class="input-group mb-3">
                                                      <input type="text" style="display: none;" id="txtcodigoparametrodetalle" name="txtcodigoparametrodetalle" class="form-control">
                                                      <select id="txtcodigoparametro" class="form-control" name="txtcodigoparametro" required>
                                                        <option value="">Buscar</option>
                                                    </select>
                                                      <div class="input-group-append">
                                                        <button title="Buscar" id="modaldataparametro" class="btn btn-primary md-trigger" data-modal="modal-2" type="button"><center><i class="feather icon-search"></i></center></button>
                                                      </div>
                                                      <div class="invalid-feedback">
                                                          Seleccione el Parametro.
                                                      </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">               
                                                  <label for="validationCustom02">DESCRIPCION</label>
                                                    <div class="input-group mb-3">
                                                    <input class="form-control" id="txtnombre" type="text" name="txtnombre" required>
                                                    <div class="invalid-feedback">
                                                        Ingrese la descripcion.
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-4 mb-3">               
                                                  <label for="validationCustom02">PUNTUACION</label>
                                                    <div class="input-group mb-3">
                                                    <input class="form-control" id="txtpuntuacion" type="number" name="txtpuntuacion" required>
                                                    <div class="invalid-feedback">
                                                        Ingrese la puntuacion.
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
                                        <div class="card-header">
                                            <h5>Listado de Parametros Detalle</h5>
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
                                          <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationCustom01">PARAMETRO</label>
                                                    <div class="input-group mb-3">
                                                      <input type="text" style="display: none;" id="txtcodigoparametrodetalle2" name="txtcodigoparametrodetalle2" class="form-control">
                                                      <select id="txtcodigoparametro2" onchange="consultar()" class="form-control" name="txtcodigoparametro2" required>
                                                        <option value="">Buscar</option>
                                                    </select>
                                                      <div class="input-group-append">
                                                        <button title="Buscar" id="modaldataparametro2" class="btn btn-primary md-trigger" data-modal="modal-3" type="button"><center><i class="feather icon-search"></i></center></button>
                                                      </div>
                                                      <div class="invalid-feedback">
                                                          Seleccione el Parametro.
                                                      </div>
                                                    </div>
                                                </div>
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
              <input type="text" readonly="" class="form-control" id="txtcodigoE" name="txtcodigoE" />
            </div>
            <div class="form-group"  style="display: none">               
              <label for="exampleInputEmail1">
                CODIGO : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtcodigoparametroE" name="txtcodigoparametroE" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                PARAMETRO : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtnombreparametroE" name="txtnombreparametroE" />
            </div>
            <div class="form-group">               
              <label for="exampleInputPassword1">
                NOMBRE : 
              </label>
              <input type="text" readonly="" class="form-control" id="txtnombreE" name="txtnombreE" />
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
       
      <h3 class="bg-primary">LISTADO DE PARAMETROS</h3>
      <div>
        <table id="res-config2" class="table table-bordered display table table-striped table-hover dt-responsive nowrap" style="width:100%">
        </table>
        <button class="btn btn-primary md-close">Cancelar</button>
      </div>
    </div>
  </div>
  <div class="md-modal md-effect-2" id="modal-3">
    <div class="md-content" style="background: #c9ccd0;">
       
      <h3 class="bg-primary">LISTADO DE PARAMETROS</h3>
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
<script src="{{ asset('js/myjs/configuracion/JS_FSE002.js') }}"></script>
@endsection