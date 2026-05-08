@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/igc/css/style.css')}}">
@endsection 

@section('skin_header')
<!-- container vai ocultar em mobile para ganhar espaço -->
<div class="container-fluid d-none d-sm-block degrade">
    <div class="row">
        <div class="col-md-12">
            <a class="skin_logo float-left" href="{{ config('app.url')}}">
                <img src="{{ asset('/vendor/laravel-usp-theme/skins/igc/images/logo_igc.png') }}" alt="Logo do Instituto de Geociências" />
            </a>
        </div>
    </div>
</div>
@endsection
