@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
<style>
    /* #skin_login_bar é o div pai */
    #skin_login_bar {
        display: block;
        background-color: #00519D;
        font-size: 16px;
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
    <span style="float:left">
    <!-- Vamos colocal o menu nesta posição -->
    </span>
    @auth
        @php
            if (is_numeric(Auth::user()->codpes))
                $ramal = \Uspdev\Replicado\Pessoa::obterRamalUsp(Auth::user()->codpes);
        @endphp
        <i class="fas fa-user"></i> {{ Auth::user()->name }} &nbsp; 
        <i class="fas fa-envelope"></i> {{ Auth::user()->email }} &nbsp; 
        @if (is_numeric(Auth::user()->codpes))
            <a class="text-white" href="https://uspdigital.usp.br/telefonia/" target="_blank" title="Se necessário, atualize seu ramal."><i class="fas fa-phone"></i> 
                {{ !empty($ramal) ? $ramal : 'sem ramal' }}</a> |    
        @endif
        @include('laravel-usp-theme::partials.login_bar.logout_link')
    @else
        Não autenticado
        @if (!config('senhaunica.hideLogin'))
          | @include('laravel-usp-theme::partials.login_bar.login_link')
        @endif
    @endauth
</div>
@endsection
