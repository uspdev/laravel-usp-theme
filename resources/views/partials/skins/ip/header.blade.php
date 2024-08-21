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
            <a class="skin_logo float-left" href="{{ config('app.url')}}">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/ip/images/logo_ip.png') }}" alt="Logo do IP - Instituto de Psicologia" />
            </a>
            <div class="float-left pr-1 pt-2">
                <div>{{ config('app.name')}} </div>
                <div class="small">Instituto de Psicologia</div>
            </div>
            <div class="skin_logo  float-right pr-1 pt-2">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/ip/images/usp.png') }}" alt="Logo da Universidade de São Paulo" />
            </div>
        </div>
    </div>
</div>
@endsection
