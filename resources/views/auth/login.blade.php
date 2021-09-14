@extends('layouts.master_auth')

@section('content')

<div class="blur-bg-images"></div>
<div class="auth-wrapper" style="background: url({{ asset('images/fondologinunabultimo.jpg') }}) round;">
    <div class="auth-content container">
        <div class="card" style="background-color: rgba(255, 255, 255, 0.49);box-shadow: 0 0 0 1px #204d5a;">
            <div class="row align-items-center">
                <div class="col-md-6">
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <center><img src="{{ asset('images/logochico.png') }}" alt="" class="img-fluid mb-4"></center>
                            <div style="border-radius: 2px; box-shadow: 0 0 0 1px #ffffff; background: #f3ba0057; margin-left: 70px;margin-right: 70px;">
                            <center><h4 class="mb-3 f-w-400" style="font-weight: bold;font-family: 'Clarendon BT', serif;font-size: 22px;text-shadow: black 0.1em 0.1em 0.2em;color: white;">FICHA SOCIOECONOMICA</h4></center>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="background: white"><i class="feather icon-user"></i></span>
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
                                    <span class="input-group-text" style="background: white"><i class="feather icon-lock"></i></span>
                                </div>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Contraseña" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <center><button class="btn btn-primary mb-4" style="background-color: #162f4d;border-color: #d2e1ec;"><i class="feather icon-log-in"></i>INGRESAR</button>
                            
                            </center>
                            </form>
                        </div>   
                        <br>
                        <center><p style="color: #f9f9f9;border-radius: 2px;box-shadow: 0 0 0 1px #ffffff;background: #f3000057;margin-left: 70px;margin-right: 70px;">Aviso para acceder al ficha socieconomica: El usuario es su código universitario y su contraseña es su nro. de DNI.</p></
                        
                        <br>
                        <center><p style="color: black">UNAB © 2019 Todos los Derechos Reservados - Desarrollado por UTIC</p></center>     
                    </div>
                <div class="col-md-6 d-none d-md-block">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/unablogin1.jpg') }}" alt="" class="img-fluid bd-placeholder-img bd-placeholder-img-lg d-block w-100">
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

@endsection
