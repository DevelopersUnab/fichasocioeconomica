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
                                                <h5 class="m-b-10">Ficha - Alumno</h5>
                                            </div>
                                            <ul class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="feather icon-home"></i></a></li>
                                                <li class="breadcrumb-item"><a href="{{ url('/reportes/fichaalumno') }}">Ficha - Alumno</a></li>
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
                                            <h5>Listado de Fichas por Alumno</h5>
                                            <br>
                                            <br>
                                            <ul class="nav navbar-right panel_toolbox">
                                              <li style="margin-right: 15px;margin-top: 10px;">
                                                <h5> Filtro de Busqueda:</h5>
                                              </li>
                                              <li style="margin-right: 15px;margin-top: 10px;"> 
                                                 <h5> Proceso</h5> 
                                              </li>
                                              <li>
                                                <select id="txtproceso" class="form-control" onchange="consultar()" name="txtproceso">
                                                    <option value="0">Seleccione</option>
                                                    @foreach($procesos as $procesosx)
                                                        <option value="{{ $procesosx->CODIGOPROCESO }}">{{ $procesosx->DESCRIPCIONSEMESTRE }}</option>
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
                                            <div class="dt-responsive table-responsive">
                                                <h6 style="display: none" id="message"></h6>
                                            <!--<div class="x_content">-->
                                                <table id="res-config" class="table table-striped table-bordered nowrap" style="width:100%">
                                                </table>
                                            </div> 
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
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/data-tables/css/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-1to10.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-horizontal.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-movie.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-pill.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-reversed.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bars-square.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/bootstrap-stars.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/css-stars.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/fontawesome-stars.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/ratting/css/fontawesome-stars-o.css') }}">
@endsection

@section('js')
<script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/ratting/js/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/myjs/reportes/JS_FSE702.js') }}"></script>
@endsection