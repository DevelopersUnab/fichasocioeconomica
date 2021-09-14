@extends('layouts.master_auth')

@section('content')

<div class="auth-prod-slider">
    <div class="blur-bg-images"></div>
    <div class="auth-wrapper" style="background-image: url(../images/dott.png),linear-gradient(to right, rgba(2, 136, 209, 0.9) 0%, rgba(57, 73, 171, 0.9) 100%);">
        <div class="auth-content container"  >
            <div class="card" >
                <div class="row align-items-center">
                    <!-- FORMULARIO DE LOGIN -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <center><img src="../../images/product/login6.jfif" alt="" class="img-fluid mb-4"></center>
                            <center><h3 class="mb-3 f-w-400" style="font-weight: bold;">SISTEMA DE FICHA SOCIOECONOMICA</h3></center>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-user"></i></span>
                                </div>
                                <input id="email" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Usuario" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="feather icon-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <center><button class="btn btn-primary mb-4">INGRESAR</button>
                            
                            </center>
                            </form>
                        </div>        
                    </div>

                    <div class="col-md-6 d-none d-md-block">
                        <div id="carouselExampleCaptions" class="carousel slide auth-slider" data-ride="carousel">
                            <div id="carouselExampleCaptions" class="carousel carousel-fade slide auth-slider" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="auth-prod-slidebg bg-1"></div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="../../images/product/login1.jpg" alt="product images" class="img-fluid mb-5">
                                       <h5>UNIVERSIDAD NACIONAL DE BARRANCA</h5>
                                        <p class="mb-5">Primera Universidad Licencidada en Lima Provincias.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="auth-prod-slidebg bg-2"></div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="../../images/product/login3.jpg" alt="product images" class="img-fluid mb-5">
                                        <h5>UNIVERSIDAD NACIONAL DE BARRANCA</h5>
                                        <p class="mb-5">La UNAB es una instituci&oacuten que ofrece una formaci&oacuten acad&eacutemica human&iacutestica, incorpora valores ciudadanos, genera conocimiento cient&iacutefico y tecnol&oacutegico y contribuye al desarrollo de la regi&oacuten y el pa&iacutes.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="auth-prod-slidebg bg-3"></div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="../../images/product/login4.png" alt="product images" class="img-fluid mb-5">
                                        <h5>UNIVERSIDAD NACIONAL DE BARRANCA</h5>
                                        <p class="mb-5">ESCUELA DE ENFERMER&IacuteA DE LA UNAB LOGRA SER INCORPORADA A LA ASOCIACI&OacuteN PERUANA DE FACULTADES Y ESCUELAS DE ENFERMER&IacuteA - ASPEFEEN.</p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="auth-prod-slidebg bg-4"></div>
                                    <div class="carousel-caption d-none d-md-block">
                                        <img src="../../images/product/login5.jfif" alt="product images" class="img-fluid mb-5">
                                        <h5>UNIVERSIDAD NACIONAL DE BARRANCA</h5>
                                        <p class="mb-5">El nuevo pabell&oacuten de aulas ha sido bautizado como Pabell&oacuten &#34Laura Esther Rodr&iacuteguez Dulanto&#34, en honor a la primera mujer que ingres&oacute a la universidad en el Per&uacute y que es natural de la provincia de Barranca. Este pabell&oacuten incluye 17 aulas con equipamiento multimedia, mobiliario moderno, conexi&oacuten a internet y wifi en todas las aulas, ascensor para acceso de personas con discapacidad, cafeter&iacutea, servicios higi&eacutenicos y salas de estar para que los estudiantes realicen sus trabajos universitarios.</p>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span></a>
                            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
