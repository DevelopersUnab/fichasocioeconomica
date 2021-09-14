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
                                <!-- [ dark-layout ] start -->
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                          <center>
                                              <div class="m-b-20">
                                                  <h1>CONSTANCIA</h1>
                                                  <hr>
                                                      <div class="card-body table-border-style" style="text-align: center;">
                                                          <div class="table-responsive">
                                                            @foreach($constancia as $constanciaS) 
                                                              <table class="table">
                                                                  <tbody>
                                                                      <tr class="table-info border-bottom-primary">
                                                                          <td style="font-weight: bold;">ESTUDIANTE</td>
                                                                          <td style="font-weight: bold;">{{ $constanciaS->NOMBRESCOMPLETOS }}</td>
                                                                      </tr>
                                                                      <tr class="table border-bottom-primary">
                                                                          <td style="font-weight: bold;">CODIGO UNIVERSITARIO</td>
                                                                          <td style="font-weight: bold;">{{ $constanciaS->CODIGOMATRICULA }}</td>
                                                                      </tr>
                                                                      <tr class="table-info border-bottom-primary">
                                                                          <td style="font-weight: bold;">FACULTAD</td>
                                                                          <td style="font-weight: bold;">{{ $constanciaS->DESCRIPCIONFACULTAD }}</td>
                                                                      </tr>
                                                                      <tr class="table border-bottom-primary">
                                                                          <td style="font-weight: bold;">ESCUELA PROFESIONAL</td>
                                                                          <td style="font-weight: bold;">{{ $constanciaS->DESCRIPCIONESCUELA }}</td>
                                                                      </tr>
                                                                  </tbody>
                                                              </table>
                                                            @endforeach  
                                                          </div>
                                                      </div>
                                                  <hr>
                                                  <p>Por haber culminado sastisfactoriamente el registro de la FICHA SOCIOECONÓMICA a través de la plantaforma Virtual para el proceso de Matrícula {{ $semestre }}.</p>
                                                  <hr>
                                                  <h3 style="font-style: oblique;">GRACIAS POR SU IMPORTANTE PARTICIPACIÓN</h3>  
                                                  <hr>
                                                  <a target="_blank" href="{{ url('/reportes/constancia') }}" type="button" class="btn btn-rounded btn-primary" style="background: #3949ab;" ><i class="feather icon-download"></i>Descargar Constancia</a>  
                                              </div>    
                                          </center>                                  
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
@endsection
