@extends('layouts.master')

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
                                            <!-- [ Info ] start -->
                                            <div class="page-wrapper">
                        <!-- [ breadcrumb ] start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-12">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Inicio</h5>
                                        </div>
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href=""><i class="feather icon-home"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- [ breadcrumb ] end -->
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <!-- [ task-detail-left ] start -->

                            <!-- [ task-detail-left ] end -->
                            <!-- [ task-detail-right ] start -->
                            <div class="col-xl-6 col-lg-12">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 style="color: white"></i> FICHA SOCIECONOMICA</h5>
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
                                        <div class="m-b-20">
                                            <h6>INFORMACION</h6>
                                            <hr>
                                            <p>La presente ficha socioeconómica está organizada por secciones y permite obtener la información de las características generales, educativas, salud, ingresos, egresos, vivienda, servicios básicos y el aspecto socio cultural de sus hogares. </p>
                                            <p>Ingrese la información con veracidad, ya que será utilizada para la elaboración de una base de datos para la formulación, evaluación y el diseño de programas de acción en el área social.</p>
                                            <p>Antes de proporcionar la información que se solicita en la Ficha Socioeconómica, por favor lea con atención cada uno de los ítems para evitar posibles confusiones.</p>
                                        </div>
                                        <div class="m-b-20">
                                            <h6>CRONOGRAMA</h6>
                                            <hr>
                                            <div class="table-responsive m-t-20">
                                                <table id="res-configN" class="table table-bordered display table table-striped table-hover dt-responsive nowrap" style="width:100%">
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if ($tipopersona==2 && $codigoprocesoactivo==1 && $estadoficha==9)
                                <a style="color: white;" target="_blank" href="{{url('reportes/constancia/')}}/{{$codigouniversitario}}" title="Descargar Constancia">
                                <div class="card table-card widget-purple-card bg-c-yellow">
                                    <div class="row-table">
                                        <div class="col-sm-4 card-body-big"><i class="fas fa-file-pdf"></i>
                                        </div>
                                        <div class="col-sm-4">
                                            <h4>Descargar Constancia</h4>
                                        </div>
                                        <div class="col-sm-4 card-body-big">
                                            <i class="fas fa-download"></i>
                                        </div>
                                    </div>
                                </div>
                                </a>
                                @endif
                            </div>

                            <div class="col-xl-6 col-lg-12 task-detail-right">
                                <div class="card">
                                    <div class="card-header bg-primary">
                                        <h5 style="color: white">DATOS PERSONALES
                                        </h5>
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
                                    <div class="card-header border-0 p-2 pb-0">
                                                    </div>
                                    <div class="card-body task-details">
                                        <table class="table" >
                                            @if ($tipopersona==1)
                                            <tbody>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Usuario:</td>
                                                    <td class="text-right">{{$codigouniversitario}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Apellido Paterno:</td>
                                                    <td class="text-right">{{$apellidopaterno}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Apellido Materno:</td>
                                                    <td class="text-right">{{$apellidomaterno}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Nombres:</td>
                                                    <td class="text-right">{{$nombres}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> DNI:</td>
                                                    <td class="text-right">{{$dni}}</td>
                                                </tr>
                                            </tbody>
                                            @else
                                            <tbody  style="font-weight: bold">
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Codigo Universitario:</td>
                                                    <td class="text-right">{{$codigouniversitario}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Apellido Paterno:</td>
                                                    <td class="text-right">{{$apellidopaterno}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Apellido Materno:</td>
                                                    <td class="text-right">{{$apellidomaterno}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Nombres:</td>
                                                    <td class="text-right">{{$nombres}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> Escuela Profesional:</td>
                                                    <td class="text-right">{{$escuelaprofesional}}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="feather icon-plus"></i> DNI:</td>
                                                    <td class="text-right">{{$dni}}</td>
                                                </tr>
                                            </tbody>
                                            @endif
                                        </table>
                                    </div>

                                                        <div class="cover-img-block">
                                                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                    <div class="carousel-item active">
                                                                        <img src="{{ asset('images/DSC_0153.JPG') }}" alt="" class="img-fluid">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                        <img src="{{ asset('images/DSC_0065.JPG') }}" alt="" class="img-fluid">
                                                                    </div>
                                                                    <div class="carousel-item">
                                                                        <img src="{{ asset('images/DSC_0135.JPG') }}" alt="" class="img-fluid">
                                                                    </div>
                                                                </div>
                                                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                                                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                                                            </div>
                                                        </div>
                                </div>
                            </div>

                            <!-- [ task-detail-right ] end -->
                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                                            <!-- [ Info ] start -->
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
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/data-tables/css/datatables.min.css') }}">
@endsection

@section('js')
<script src="{{ asset('plugins/data-tables/js/datatables.min.js') }}"></script>
<script>
$(document).ready(function() {
    var dataTable = $('#res-configN').DataTable({
        responsive: true,
        "searching": false,
        "pageLength": 5,
        "destroy": true,
        "paging":   false,
        "ordering": false,
        "info":     false,
        "order": [
            [0, "desc"]
        ],
        "ajax": {
            url: "listarEscuelaCronograma",
            type: "POST",
            data: {}
        },
        "columns": [{
            "title": "#",
            "data": "CODIGOPROCESOESCUELA",
            "width": 1,
            "visible":false
        }, {
            "title": "ESCUELA",
            "render": function(data, type, row) {
                return "<i class='fas fa-layer-group'></i>         "+row.DESCRIPCIONESCUELA
            },
            "width": 200
        }, {
            "title": "FECHA INICIO",
            "render": function(data, type, row) {
                var fecha = new Date(row.FECHAINICIO.replace(/-/g, '\/'));
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return "<i class='far fa-calendar-alt'></i>         "+fecha.toLocaleDateString("es-ES", options)
            },
            "width": 30
        }, {
            "title": "FECHA FIN",
            "render": function(data, type, row) {
                var fecha = new Date(row.FECHAFIN.replace(/-/g, '\/'));
                var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return "<i class='far fa-calendar-alt'></i>         "+fecha.toLocaleDateString("es-ES", options)
            },
            "width": 30
        }],
        dom: 'Bfrtip',
        buttons: [],
        "language": {
            "lengthMenu": "Mostrar _MENU_ postulaciones",
            "zeroRecords": "No se encontró ningún registro",
            "info": "_PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de un total de _MAX_ total registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
    });
});
</script>
@endsection
