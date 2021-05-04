@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_header é o div pai */
    #skin_header .container-fluid {
        display: block;
        height: 70px;
        background-color: #EDEDEE;
        font-size: 20px;
    }

    #skin_header .skin_logo img {
        height: 65px;
        margin: 2px;
    }

    #eesc_set_logo {
        position: absolute;
        left: 0px;
        top: 0px;
        height: 90px;
    }

    #eesc_set_logo_space {
        display:block;
        width: 110px;
    }

</style>
@endsection

@section('skin_header')
<!-- container vai ocultar em mobile para ganhar espaço -->
<div class="container-fluid d-none d-sm-block" style="z-index:-1">
    <div class="navbar">
        <a class="navbar-brand" href="http://www.set.eesc.usp.br">
            <img id="eesc_set_logo" src="{{ asset('/vendor/laravel-usp-theme/skins/eesc_set/images/set-logo.png') }}" alt="Logo do SET/EESC" />
            <div id="eesc_set_logo_space"></div>
        </a>
        <div class="navbar-text mr-auto pt-0 d-none d-md-block">
            Departamento de Engenharia de Estruturas<br>
            <span class="small">Escola de Engenharia de São Carlos</span>
        </div>
        <div class="navbar-text pt-0">
            <a href=" https://www.eesc.usp.br">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/eesc_set/images/logo_eesc_horizontal.png') }}" height="50px" alt="Logo da EESC/USP" />
            </a>
        </div>
    </div>
</div>
@endsection
