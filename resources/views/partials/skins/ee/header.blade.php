@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/ee/css/style.css')}}">
@endsection 

@section('skin_header')
    <div class="ee-logodefault">

        <div class="ee-firstsecondthird">

            <div class="ee-logowrap">
                <div class="ee-item">
                    <a class="ee-logo-link" href="{{ config('app.url')}}">
                    <img class="ee-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ee/images/logo-eeusp.png') }}">
                    </a>
                </div>
            </div>

            <div class="ee-second">       
                <div class="ee-item">
                    <div class="ee-site-name">
                        <a class="ee-site-name-link" href="{{ config('app.url')}}">{{ config('app.name')}} </a>
                    </div>
                </div>
            </div>
            
            <div class="ee-third">
                <div class="ee-item">
                    <a class="ee-logo-usp-link" href="https://www.usp.br" target="_blank">
                        <img class="ee-logo-img" src="{{ asset('/vendor/laravel-usp-theme/skins/ee/images/usp.png') }}" alt="Logo da Universidade de São Paulo">
                    </a>  
                </div>
            </div>

        </div>
        
    </div>

@endsection
