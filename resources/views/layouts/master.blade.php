<!DOCTYPE html>
<html lang="es">

<head>
    <title>FSE - UNAB </title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />

    <link href="{{ asset('fonts/fontawesome/css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/animation/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins/prism/css/prism.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon5.png') }}" type="image/x-icon">

    <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}">
    @yield('css')
</head>

<body class="" urlbase="{{ url('/') }}">
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    
    <!--BARRA LATERAL-->
    <nav class="pcoded-navbar navbar-gradient-blue brand-dark">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
            <a href="{{ url('/') }}" class="b-brand">
                <img src="{{ asset('images/FSELOGOMASTER.png') }}" alt="" class="logo images">
                <img src="{{ asset('images/iconoprincipal.png') }}" alt="" class="logo-thumb images">
            </a>
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Menús</label>
                    </li>
                    <li>
                        <a href="{{ url('/') }}"><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">INICIO</span></a>
                    </li>
                    @if( Auth::user()->isAdministrador())                    
                    <li data-username="Configuracion rol sistemas" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-settings"></i></span><span class="pcoded-mtext">CONFIGURACION</span></a>
                        <ul class="pcoded-submenu">
                            @foreach($modulos as $modulos)
                                <li class="">
                                <a href="{{ url($modulos->HREF) }}"><span class="pcoded-mtext">{{ $modulos->NOMBRE }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif 
                    @if( Auth::user()->isAdministrador() || Auth::user()->isAlumno())             
                    <li data-username="Procesos asignacion-sistema creacion-usuario" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-edit-2"></i></span><span class="pcoded-mtext">PROCESOS</span></a>
                        <ul class="pcoded-submenu">
                            @foreach($modulos2 as $modulos2)
                                <li class="">
                                <a href="{{ url($modulos2->HREF) }}" data-toggle="modal" data-target="#exampleModalCenter" id="li{{ $modulos2->CODIGOUSUARIOMODULO }}"><span class="pcoded-mtext sweet-warning">{{ $modulos2->NOMBRE }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif
                    @if( Auth::user()->isAdministrador())             
                    <li data-username="Procesos asignacion-sistema creacion-usuario" class="nav-item pcoded-hasmenu">
                        <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-file-text"></i></span><span class="pcoded-mtext">REPORTES</span></a>
                        <ul class="pcoded-submenu">
                            @foreach($modulos3 as $modulos3)
                                <li class="">
                                <a href="{{ url($modulos3->HREF) }}"><span class="pcoded-mtext">{{ $modulos3->NOMBRE }}</span></a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @endif  
                </ul>
            </div>
        </div>
    </nav>

    <!--HEADER-->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-blue">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="index.html" class="b-brand">
                <!-- <div class="b-bg">
                    <i class="fas fa-bolt"></i>
                </div>
                <span class="b-title">Flash Able</span> -->
                <img src="{{ asset('images/FSELOGOMASTER.png') }}" alt="" class="logo images">
                <img src="{{ asset('images/iconoprincipal.png') }}" alt="" class="logo-thumb images">
            </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
        <a href="#!" class="mob-toggler"></a>
            <ul class="navbar-nav mr-auto">
            <li><a href="#!" class="full-screen" onclick="javascript:toggleFullScreen()"><i class="feather icon-maximize"></i></a></li>
        </ul>
            <ul class="navbar-nav ml-auto">
                    <li>
                        <div class="dropdown drp-user">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon feather icon-settings"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-notification">
                                <div class="pro-head">
                                    <img src="{{ asset('images/user/avatar-1.jpg') }}" class="img-radius" alt="User-Profile-Image">
                                    <span>{{ Auth::user()->name }}</span>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dud-logout" title="Logout">
                                        <i class="feather icon-log-out"></i>
                                    </a>
                                </div>
                                <ul class="pro-body">
                                    @if( Auth::user()->isAdministrador()) 
                                    <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter"><i class="feather feather icon-unlock" ></i>Cambiar Contraseña</a></li>
                                    @endif 
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="feather icon-lock"></i>Cerrar Sesión</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    </form>
        </div>
    </header>
    <div id="exampleModalCenter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <form method="post" id="user_formLogin">
        <div class="modal-dialog modal-dialog-centered" role="document">
            
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Contraseña Actual</label>
                        <input type="password" id="txtcontrasenactual" name="txtcontrasenactual" class="form-control"  maxlength="255" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Contraseña Nueva</label>
                        <input type="password" id="txtcontrasenanueva" name="txtcontrasenanueva" class="form-control"  maxlength="255" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Vuelve a escribir la contraseña nueva</label>
                        <input type="password" id="txtvuelvecontrasenanueva" name="txtvuelvecontrasenanueva" maxlength="255" class="form-control" placeholder="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnCancelarLogin" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGrabar" class="btn btn-primary">Guardar</button>
                </div>
            </div>            
        </div>
        </form>
    </div>
    <!-- CONTENIDO -->    
    @yield('content')
    
    <script src="{{ asset('js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pcoded.min.js') }}"></script>

    <script src="{{ asset('plugins/prism/js/prism.min.js') }}"></script>
    <script src="{{ asset('js/analytics.js') }}"></script>
    
    @include('VB_SIS002')

    <script>
        $(document).ready(function() {
      $urlbase = $("body").attr('urlbase');
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on('click', '#btnCancelarLogin', function() {
        txtcontrasenactual = $('#txtcontrasenactual').val('');
        txtcontrasenanueva = $('#txtcontrasenanueva').val('');
        txtvuelvecontrasenanueva = $('#txtvuelvecontrasenanueva').val('');
    });

    $(document).on('submit', '#user_formLogin', function(event) {
        event.preventDefault();
            urlbase = $("body").attr('urlbase');
            url = urlbase + "/cambiarContrasena";
            $.ajax({
                url: url,
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                complete: function(response) {}
            }).then(function(data) {
                if (data.success == true) {
                    $('#exampleModalCenter').modal('hide');
                    swal(data.message, "", "success");
                    txtcontrasenactual = $('#txtcontrasenactual').val('');
                    txtcontrasenanueva = $('#txtcontrasenanueva').val('');
                    txtvuelvecontrasenanueva = $('#txtvuelvecontrasenanueva').val('');
                } else {
                    swal("Error", data.message, "warning");
                }
            });
        
    });
    </script>
    @yield('js')
    
</body>

</html>