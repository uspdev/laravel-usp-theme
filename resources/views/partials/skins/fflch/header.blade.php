@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/fflch/css/style.css')}}">
@endsection 

@section('skin_header')
    <!-- TODO container vai ocultar em mobile para ganhar espaço (d-none d-sm-block) -->
    <div class="fflch-logodefault">

        <div class="fflch-firstsecondthird">

            <div class="fflch-first">
                <div class="fflch-item">
                    <a class="fflch-logo-link" href="{{ config('app.url')}}">
                    <img class="fflch-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/fflch/images/logo_fflch.png') }}">
                    </a>
                </div>
            </div>

            <div class="fflch-second">       
                <div class="fflch-item">
                    <div class="fflch-slogan">
                        <a class="fflch-slogan-link"  href="{{ config('app.url')}}">{{ config('laravel-usp-theme.slogan','Faculdade de Filosofia, Letras e Ciências Humanas') }} </a>
                    </div>

                    <div class="fflch-site-name">
                        <a class="fflch-site-name-link" href="{{ config('app.url')}}">{{ config('app.name')}} </a>
                    </div>
                </div>
            </div>
            
            <div class="fflch-third">
                <div class="fflch-item">
                    <a class="fflch-logo-usp-link" href="https://www.usp.br" target="_blank">
                        <img class="fflch-logo-usp-img" src="{{ asset('/vendor/laravel-usp-theme/skins/fflch/images/usp.png') }}" alt="Logo da Universidade de São Paulo">
                    </a>  
                </div>
            </div>

        </div>
        
    </div>

@endsection
