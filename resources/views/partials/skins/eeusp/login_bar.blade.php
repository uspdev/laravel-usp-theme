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
