@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_header é o div pai */
    #skin_header  .container-fluid {
        display: block;
        height: 70px;
        background-color: #FFFFFF;
        font-size: 20px;
    }

    #skin_header .skin_logo img {
        height: 50px;
        margin: 10px;
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
            <a class="skin_logo" href="https://portalservicos.usp.br/">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/uspdev/images/usp-logo.png') }}" alt="Logo da Universidade de São Paulo">
            </a>
            <span class="skin_texto">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/uspdev/images/usp-logo-texto.png') }}" alt="Universidade de São Paulo">
            </span>
        </div>
    </div>
</div>
@endsection
