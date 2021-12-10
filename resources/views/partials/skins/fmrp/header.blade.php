@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_header é o div pai */
    #skin_header  .container-fluid {
        display: block;
        height: 90px;
        background-color: #FFFFFF;
        font-size: 20px;
    }

    #skin_header .skin_logo img {
        height: 75px;
        margin: 10px;
        border:0px;
    }

    .skin_logo_right img {
        height: 70px;
        margin: 10px;        
    }
    
    .skin_titulo {
        margin-top:10px;        
        margin-left:20px;
        font-size:1.1em;        
        color: darkolivegreen;
    }

    #skin_header .skin_texto img {
        margin-top: 8px;
        height: 50px;
    }

</style>
@endsection



@section('skin_header')
<!-- container vai ocultar em mobile para ganhar espaço -->
<div class="container-fluid d-none d-sm-block">
    <div class="row">
        <div class="col-md-12">
            <a class="skin_logo float-left" href="{{ config('app.url')}}">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/fmrp/images/fmrp-logo.png') }}" alt="Logo da FMRP - Faculdade de Medicina de Ribeirão Preto" />
            </a>
            <div class="skin_titulo float-left pr-1 pt-2">
                <div><b>Faculdade de Medicina de Ribeirão Preto</b></div>
                <div class="small">Universidade de São Paulo</div>
            </div>
            <div class="skin_logo_right  float-right pr-1 pt-2">
                @if (isset($_ENV["USP_THEME_LOGO_DIREITA"]))
                    <img src="{{ asset($_ENV['USP_THEME_LOGO_DIREITA']) }}" />
                @else
                    <img src="{{ asset('/vendor/laravel-usp-theme/skins/fmrp/images/usp.png') }}" />
                @endif
            </div>
        </div>
    </div>
</div>
@endsection



