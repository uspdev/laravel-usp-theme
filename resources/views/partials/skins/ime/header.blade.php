@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/ime/css/style.css')}}">
@endsection 

@section('skin_header')
    <!-- TODO container vai ocultar em mobile para ganhar espaço (d-none d-sm-block) -->
    <div class="ime-logodefault">

        <div class="ime-firstsecondthird">

            <div class="ime-first">
                <div class="ime-item">
                    <a class="ime-logo-link" href="{{ config('app.url')}}">
                    <img class="ime-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ime/images/logo_ime.png') }}">
                    </a>
                </div>
            </div>

            <div class="ime-second">       
                <div class="ime-item">
                    <div class="ime-slogan">
                        <a class="ime-slogan-link"  href="{{ config('app.url')}}">{{ config('laravel-usp-theme.slogan','Instituto de Matemática e Estatística') }} </a>
                    </div>

                    <div class="ime-site-name">
                        <a class="ime-site-name-link" href="{{ config('app.url')}}">{{ config('app.name')}} </a>
                    </div>
                </div>
            </div>
            
            <div class="ime-third">
                <div class="ime-item">
                    <a class="ime-logo-usp-link" href="https://www.usp.br" target="_blank">
                        <img class="ime-logo-usp-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ime/images/usp.png') }}" alt="Logo da Universidade de São Paulo">
                    </a>  
                </div>
            </div>

        </div>
        
    </div>

@endsection
