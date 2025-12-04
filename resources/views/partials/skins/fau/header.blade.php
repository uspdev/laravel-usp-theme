@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}

<link rel="stylesheet" href="{{ asset('/vendor/laravel-usp-theme/skins/fau/css/fau.css') }}">

@endsection

@section('skin_header')
<div class="container-fluid d-none d-sm-block">
    <div class="row">
        <div class="col-md-12">
            {{-- Usando classes d-flex do Bootstrap para alinhamento vertical --}}
            <div class="skin_branding">
                <a class="skin_logo" href="#">
                    <img src="{{ asset('/vendor/laravel-usp-theme/skins/fau/images/fau-logo.png') }}" alt="Faculdade de Arquitetura e Urbanismo e de Design">
                </a>
                <span class="skin_texto">
                    <img src="{{ asset('/vendor/laravel-usp-theme/skins/fau/images/fau-logo-texto.png') }}" alt="FAU">
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
