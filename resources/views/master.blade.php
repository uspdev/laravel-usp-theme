<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>

  @section('styles')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
  @show

  @section('javascripts_head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  @show
</head>

<body>



  <div class="container-fluid">
      <div class="row">
    <div class="col-md-2">
      <a class="logo-imagem" href="#"></a>
    </div>

    <div class="col-md-6">
      <a class="logo-texto" href="#"></a>
    </div>
</div>
    @yield('header')
  <div class="row">
    <div class="logo-faixa">
      <p class="texto-usuario">987654321 - Nome do usuário | PAPEL   | <strong>Sair</strong></p>
    </div>
  </div>
  </div>

  <div class="container-fluid">
<div class="row">
  @include('laravel-usp-theme::partials.menu')
</div>



<div class="row">

  <div id="content" class="container">
    @yield('content')
  </div>

</div>

@include('laravel-usp-theme::partials.footer')

@section('javascripts')
  <script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>
@show

</body>
</html>
