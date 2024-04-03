@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_login_bar é o div pai */
    #skin_login_bar {
        display: block;
        /*background-color: #a19152; /*dourado*/
        background-color: #004437; /*verde*/
        font-size: 15px;
        color: #FFFFFF;
        padding-top: 5px;
        margin-bottom: 5px;
    }

    /* .login_logout_link formata os links correspondentes que estão nos includes */
    #skin_login_bar .login_logout_link {
        color: #FFFFFF !important;
        text-decoration: none !important;
        font-weight: bold;
        padding-left: 5px;
        padding-right: 10px;
    }

</style>
@endsection

@section('skin_login_bar')
{{-- esta faixa está fora de container para tocar as bordas da janela --}}
<div class="text-right">
    @auth
        {{ Auth::user()->name }} - {{ Auth::user()->email }} |
        @include('laravel-usp-theme::partials.login_bar.logout_link')
    @else
        Não autenticado |
        @include('laravel-usp-theme::partials.login_bar.login_link')
    @endauth
</div>
@endsection
