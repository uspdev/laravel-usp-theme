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

</style>
@endsection

@section('skin_header')
<!-- container vai ocultar em mobile para ganhar espaço -->
<div class="container-fluid d-none d-sm-block">
    <div class="row">
        <div class="col-md-12">
            <a class="skin_logo" href="https://sistemas.eesc.usp.br">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/eesc_testing/images/logo_eesc_testing.png') }}" alt="Logo da Universidade de São Paulo" />
            </a>
            <div class="float-right text-right pr-1 pt-2">
                <div>Sistemas Administrativos</div>
                <div class="small">Escola de Engenharia de São Carlos</div>
            </div>
        </div>
    </div>
</div>
@endsection
