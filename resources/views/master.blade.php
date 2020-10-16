<!DOCTYPE html>
<html lang="pt_br">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@section('title'){{ $title }}@show</title>

    <base href="{{ $dashboard_url }}/">

    <link rel="canonical" href="https://github.com/uspdev/laravel-usp-theme">

    {{-- carrega styles_default e js_bottom_def --}}
    @include('laravel-usp-theme::partials.assets_default')

    @yield('styles_default')

    <link rel="stylesheet" href="{{ asset('/vendor/laravel-usp-theme/css/style.css')}}">

    @yield('styles')

    @yield('js_head_def') {{-- está vazio --}}

    @yield('javascripts_head')
</head>

<body>
    <div class="container-fluid d-none d-sm-block">
        {{-- Vai ocultar em mobile --}}
        @include('laravel-usp-theme::partials.heade')
    </div>

    <div class="logo-faixa">
        @include('laravel-usp-theme::partials.login_bar')
    </div>

    <div class="menu">
        @include('laravel-usp-theme::partials.menu')
    </div>

    <div class="container-fluid">
        <div class="row">
            <div id="content" class="col-md-12">
                @yield('flash')
                @section('content')
                @include('laravel-usp-theme::partials.content_sample')
                @show
            </div>
        </div>
    </div>

    @include('laravel-usp-theme::partials.footer')

    @yield('js_bottom_def')

    <script type="text/javascript" src="{{ asset('/vendor/laravel-usp-theme/js/script.js') }}"></script>

    @yield('javascripts_bottom')

</body>

</html>
