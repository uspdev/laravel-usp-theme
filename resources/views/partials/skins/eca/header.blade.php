@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_header é o div pai */
     #skin_header .container-fluid {
        display: flex;
        align-items: center; 
        justify-content: space-between;
        height: 70px; 
        background-color: #FFFFFF;
        padding:  15px 20px 0px 30px;
        font-size: 20px;
        overflow: hidden; 
    }

    #skin_header .skin_logo img {
        height: 80px; 
        width: auto;
        object-fit: contain;
        display: block; 
    }

    /* Bloco do texto ao lado do logo */
    #skin_header .skin_texto_lateral {
        display: block;
        flex-direction: column;
        justify-content: center;
        margin-left: 40px;
        margin-top: 15px !important; 
        padding-top: 0 !important;
        font-size: 20px;
    }
    
    #skin_header .skin_texto_lateral div:first-child {
        font-weight: 500;
        line-height: 1.1; 
        margin-bottom: 4px;
    }
    
    #skin_header .skin_texto_lateral div.small {
        font-size: 16px;
        line-height: 1.2; 
    }

    /* Barra vermelha para ambiente local */
    @if(config('app.env') === 'local' && env('USP_THEME_SHOW_ENV_BANNER', true))
    #skin_login_bar {
        background-color: #cc0000 !important;
    }
    #skin_login_bar::before {
        content: "{{ env('USP_THEME_ENV_LABEL', 'Ambiente de desenvolvimento') }}"; 
        position: absolute;
        left: 20px;
        color: {{ env('USP_THEME_ENV_FONT_COLOR', 'white') }};
        font-weight: {{ env('USP_THEME_ENV_FONT_WEIGHT', 'bold') }};
        font-size: {{ env('USP_THEME_ENV_FONT_SIZE', '14px') }};
    }
    @endif
    
@endsection

@section('skin_header')
<div class="container-fluid d-none d-sm-flex">
    
    {{-- Bloco da Esquerda: Logo ECA + Texto --}}
    <div class="d-flex align-items-start">
        <a class="skin_logo" href="{{ config('app.url')}}">
            <img src="{{ asset('/vendor/laravel-usp-theme/skins/eca/images/logo_eca.png') }}" alt="Logo da ECA" />
        </a>
        <div class="skin_texto_lateral">
            <div>{{ config('app.name')}}</div>
            <div class="small">Escola de Comunicações e Artes</div>
        </div>
    </div>

    {{-- Bloco da Direita: Logo USP --}}
    {{-- Comentado temporariamente a pedido
    <div class="skin_logo">
        <img src="{{ asset('/vendor/laravel-usp-theme/skins/eca/images/usp.png') }}" alt="Logo da USP" />
    </div>
    --}}

</div>
@endsection