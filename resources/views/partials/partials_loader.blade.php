{{-- carrega styles e javascripts das bibliotecas JS do tema --}}
@include('laravel-usp-theme::partials.assets_default')

{{-- Partes personalizáveis por skin --}}
@include('laravel-usp-theme::partials.skin_header_loader')
@include('laravel-usp-theme::partials.skin_login_bar_loader')
@include('laravel-usp-theme::partials.skin_footer_loader')

{{-- Por enquanto testando novo paradigma na FFLCH --}}
@if(env('USP_THEME_SKIN') == 'fflch')
  @include('laravel-usp-theme::partials.skin_menu_loader')
@endif

@include('laravel-usp-theme::partials.menu.menu')

@section('styles_default')
@parent
<link rel="stylesheet" href="{{ asset('/vendor/laravel-usp-theme/css/style.css') }}">
@endsection

@section('javascripts_default')
@parent
<script type="text/javascript" src="{{ asset('/vendor/laravel-usp-theme/js/script.js') }}"></script>
@endsection