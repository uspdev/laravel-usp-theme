<div Class="d-flex justify-content-end">

    @auth
    {{ Auth::user()->name }} - {{ Auth::user()->email }} |
    @if ( $logout_method == 'POST' )
    <form action="{{ $logout_url }}" method="POST" class="form-inline" style="display:inline-block" id="logout_form">
        {{ csrf_field() }}
        <!-- O uso do link ao invés do botao é para poder formatar corretamente -->
        <a onclick="document.getElementById('logout_form').submit(); return false;"
            class="font-weight-bold text-white nounderline pr-2 pl-2" href>
            <i class="fas fa-sign-out-alt"></i> Sair
        </a>
    </form>
    @else
    <a class="font-weight-bold text-white nounderline pr-2 pl-2" href="{{ $logout_url }}">
        <i class="fas fa-sign-out-alt"></i> Sair
    </a>
    @endif
    @else
    Não autenticado |
    <a class="font-weight-bold text-white nounderline pr-2 pl-2" href="{{ $login_url }}">
        <i class="fas fa-sign-in-alt"></i> Entrar
    </a>
    @endauth

</div>