@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/ip/css/style.css')}}">
@endsection 

@section('skin_header')
    <!-- TODO container vai ocultar em mobile para ganhar espaço (d-none d-sm-block) -->
    <div class="ip-logodefault">

        <div class="ip-firstsecondthird">

            <div class="ip-first">
                <div class="ip-item">
                    <a class="ip-logo-link" href="{{ config('app.url')}}">
                    <img class="ip-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ip/images/logo_ip.png') }}">
                    </a>
                </div>
            </div>

            <div class="ip-second">       
                <div class="ip-item">
                    <div class="ip-slogan">
                        <a class="ip-slogan-link"  href="{{ config('app.url')}}">{{ config('laravel-usp-theme.slogan','Instituto de Psicologia') }} </a>
                    </div>

                    <div class="ip-site-name">
                        <a class="ip-site-name-link" href="{{ config('app.url')}}">{{ config('app.name')}} </a>
                    </div>
                </div>
            </div>
            
            <div class="ip-third">
                <div class="ip-item">
                    <a class="ip-logo-usp-link" href="https://www.usp.br" target="_blank">
                        <img class="ip-logo-usp-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ip/images/usp.png') }}" alt="Logo da Universidade de São Paulo">
                    </a>  
                </div>
            </div>

        </div>
        
    </div>

@endsection
