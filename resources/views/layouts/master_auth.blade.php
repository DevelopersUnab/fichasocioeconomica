<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'FSE') | UNAB </title>


    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/fontawesome-all.min.css')}}">
    
    <link rel="stylesheet" href="{{asset('plugins/animation/css/animate.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <link rel="stylesheet" href="{{asset('plugins/data-tables/css/datatables.min.css')}}">

    <link rel="icon" href="{{asset('images/favicon5.png')}}" type="image/x-icon">

  </head>

  <body class="login">
    @yield('content')
    
     <script src="{{ asset('js/vendor-all.min.js') }}"></script>  
     <script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>  
  </body>

  @include('VB_SIS002')

</html>