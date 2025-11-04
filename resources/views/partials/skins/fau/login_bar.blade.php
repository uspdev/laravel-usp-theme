@section('skin_login_bar')
{{-- A div #skin_login_bar (a seção) recebe o fundo azul --}}
<div class="container-fluid"> {{-- container para alinhar o conteúdo --}}
    <div class="text-end"> {{-- text-end (Bootstrap 5) ou text-right (Bootstrap 4) --}}
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
