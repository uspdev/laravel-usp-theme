<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/favicon.ico">

        <title>@yield('title')</title>

        <!-- Javascript -->
        @section('javascripts_head')
        @show

        <!-- CSS -->
        @section('styles')
            <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
        @show
    </head>

    <body>
        {{--@include('laravel-usp-theme::partials.nav')--}}

        <div class="container-fluid">
          <div class="row">
            <div class="col text-center">
                @yield('header')

            </div>
          </div>
          <div class="row justify-content-end mb-1">
             @yield('right-top-menu')
          </div>
          <div class="row">
            @include('laravel-usp-theme::partials.menu')
          </div>
          <div class="row">
            <main role="main" class="p-5 container-fluid">
                @yield('content')
            </main>
          </div>
          <div class="row">
            <div class="col">
              <footer class="page-footer font-small blue">
                @include('laravel-usp-theme::partials.footer')
              </footer>
            </div>
          </div>
        </div>

        @section('javascripts')
            <script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>
        @show
    </body>
</html>
