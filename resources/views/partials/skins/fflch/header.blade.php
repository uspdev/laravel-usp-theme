@section('skin_styles')
    @parent {{-- devemos incluir o conteúdo existente --}} 
    <!-- TODO remover a tag style e deixar apena so link:css-->
    <link rel="stylesheet" property="stylesheet"  href="{{ asset('/vendor/laravel-usp-theme/skins/fflch/css/header.css')}}">
    <style>
        /**container */
        .container.container-fflch{
            padding: 0;
        }

        .fflch-logodefault img{
            max-width: 100%;
            height: auto;
        }

        /*----------LOGOS E NOMES-----------*/
        @media (min-width:768px){
            /*LOGODEFAULT*/
            .fflch-logodefault{
            display:block;
            position:relative;
            padding-bottom: 30px;
            padding-top: 30px;

            }
            
            /*CONTAINER DE LOGOS E NOMES*/
            .fflch-firstsecondthird {
            display: grid;
            grid-template-columns: 157px auto 95px;
            width: 100%;
            }
            
            /*LOGO FFLCH*/
            .fflch-first{
            width: 157px;
            height:51px;
            min-width: 84px;

            }
            
            /*NOME E SLOGAN*/
            .fflch-second{
            padding-left: 10px;
            padding-right: 10px;

            }
            /*LOGO USP*/
            .fflch-third {
            width: 95px; 
            height:51px;
            }

            .fflch-logo-usp-img {
            padding-top: 15px;
            }
            
            
            /*CONTEÙDO DO SECOND (SITE E SLOGAN)*/
            /*FONTE*/
            .fflch-second a{
            Font-family: "Arial Narrow", "Arial" , Sans-serif;
            text-transform: uppercase;
            text-decoration: none;
            color: rgb(39, 62, 116);
            }
            
            /*SLOGAN*/
            .fflch-slogan {
            font-size: 13pt;
            line-height: 1em;
            padding-left: 2px;
            margin-bottom: -1px;
            }
            
            /*NOME DO SITE*/
            .fflch-site-name {
            font-size: 30pt;
            line-height: 1em;
            margin-bottom: -6px;
            }
        
    
        }
    
        /*--------------------------(-)767px------------------------*/
        @media (max-width:767px){
            /*----------LOGOS E NOMES-----------*/
            
            /*LOGODEFAULT*/
            .fflch-logodefault{
                display:block;
                position:relative;
                padding-bottom: 5%;
                padding-top: 5%;
            }
            
            /*CONTAINER DE LOGOS E NOMES*/
            .fflch-firstsecondthird {
                display: flex;
                flex-wrap: nowrap;    
                width: 100%;    
                padding-left: 10px;    
                padding-right: 10px; 
            }
            
            /*LOGO FFLCH*/
            .fflch-first{
                width: 84px;
                min-width: 84px;
            }
            
            /*NOME E SLOGAN*/
            .fflch-second{
                padding-left: 6px;
            }
            /*LOGO USP*/
            .fflch-third {
                display:none;
            }

            
            /*CONTEÙDO DO SECOND (SITE E SLOGAN)*/
            /*FONTE*/
            .fflch-second a{
                Font-family: "Arial Narrow", "Arial" , Sans-serif;
                text-transform: uppercase;
                text-decoration: none;
                color: rgb(39, 62, 116);
            }
            
            /*SLOGAN E NOME DO SITE*/
            .fflch-slogan, .fflch-site-name {
                font-size: 15px;
                line-height: 13px;
            }
        
        }
 
    </style>

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
                        <a class="fflch-slogan-link"  href="{{ config('app.url')}}">{{ config('app.slogan')}} </a>
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
