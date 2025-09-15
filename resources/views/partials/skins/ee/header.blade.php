@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/eeusp/css/style.css')}}">
@endsection 

@section('skin_header')
    <div class="eeusp-logodefault">

        <div class="eeusp-firstsecondthird">

            <div class="eeusp-logowrap">
                <div class="eeusp-item">
                    <a class="eeusp-logo-link" href="{{ config('app.url')}}">
                    <img class="eeusp-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/eeusp/images/logo-eeusp.png') }}">
                    </a>
                </div>
            </div>

            <div class="eeusp-second">       
                <div class="eeusp-item">
                    <div class="eeusp-site-name">
                        <a class="eeusp-site-name-link" href="{{ config('app.url')}}">{{ config('app.name')}} </a>
                    </div>
                </div>
            </div>
            
            <div class="eeusp-third">
                <div class="eeusp-item">
                    <a class="eeusp-logo-usp-link" href="https://www.usp.br" target="_blank">
                        <img class="eeusp-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/eeusp/images/usp.png') }}" alt="Logo da Universidade de São Paulo">
                    </a>  
                </div>
            </div>

        </div>
        
    </div>

@endsection
