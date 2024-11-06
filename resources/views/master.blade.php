<!DOCTYPE html>
<html lang="pt-BR">

    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="{{ asset('vendor/laravel-usp-theme/skins/' . strtolower($skin) . '/images/favicon.ico') }}" type="image/x-icon">

        <title>@section('title'){{ $title }}@show</title>

        <base href="{{ $app_url }}/">

        <link rel="canonical" href="https://github.com/uspdev/laravel-usp-theme">

        {{-- Incluindo todos os partials necessários para o theme --}}
        @include('laravel-usp-theme::partials.partials_loader')

        <!-- Estilos do tema e das bibliotecas internas -->
        @yield('styles_default')

        <!-- Estilos do skin -->
        @yield('skin_styles')

        <!-- Estilos da aplicação -->
        @yield('styles')
    </head>

    <body>
        <div id="skin_header" class="{{ $container }}"> {{-- Cria a barra de topo, em geral com o logo da unidade --}}
            @yield('skin_header')
        </div>

        <div id="skin_login_bar" class="{{ $container }}"> {{-- Cria a barra de login/logout --}}
            @yield('skin_login_bar')
        </div>

        <div id="menu" class="{{ $container }}"> {{-- Cria a barra de menus da aplicação --}}
            @yield('menu')
        </div>

        <div class="{{ $container }}">
            <div class="row">
                <div id="content" class="col-md-12">
                @section('flash')
                    @includewhen(config('laravel-usp-theme.mensagensFlash'),'laravel-usp-theme::partials.content_flash')
                @show
                @section('content')
                    {{-- Conteúdo principal vai aqui. O include de exemplo deve ser
                substituído pelo conteúdo da aplicação não usando o @parent --}}
                    @include('laravel-usp-theme::partials.content_sample')
                @show
            </div>
        </div>
    </div>

    <div id="skin_footer" class="{{ $container }}"> {{-- Cria a barra do rodapé --}}
        @yield('skin_footer')
    </div>

    <!-- Bibliotecas js do tema e das bibliotecas internas -->
    @yield('javascripts_default')

    <!-- Bibliotecas js da aplicação -->
    @yield('javascripts_bottom')

</body>

</html>
