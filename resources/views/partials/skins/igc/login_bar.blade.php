@section('skin_styles')
@parent {{-- devemos incluir o conteúdo existente --}}
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
