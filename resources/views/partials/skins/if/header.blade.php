@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_header é o div pai */
    #skin_header  .container-fluid {
        display: block;
        height: 100px;
        background-color: #FFFFFF;
        font-size: 24px;
    }

    #skin_header .skin_logo img {
        height: 80px;
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
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/if/images/logo_if.png') }}" alt="Logo do Instituto de Física" />
            </a>
            <div class="float-left pr-1 pt-2">
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
