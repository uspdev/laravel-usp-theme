@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_login_bar é o div pai */
    #skin_login_bar {
        display: block;
        font-size: 16px;
        color: #273e74;
        padding-top: 5px;
        margin-bottom: 5px;
    }

    /* .login_logout_link formata os links correspondentes que estão nos includes */
    #skin_login_bar .login_logout_link {
        color: #273e74 ;
        text-decoration: none !important;
        font-weight: bold;
        padding-left: 5px;
    }
    #skin_login_bar  svg{
        color: #273e74 ;
    }

</style>
@endsection

@section('skin_login_bar')

<div class="container p-0">
    <div class="text-right">
        <span style="float:left">
        <!-- Vamos colocal o menu nesta posição -->
        </span>
        @auth
            {{ Auth::user()->name }} - {{ Auth::user()->email }} |
            @include('laravel-usp-theme::partials.login_bar.logout_link')
        @else
            Não autenticado |
            @include('laravel-usp-theme::partials.login_bar.login_link')
        @endauth
    </div>
</div>
@endsection
