@if ( $logout_method == 'POST' )
<form action="{{ $logout_url }}" method="POST" class="form-inline" style="display:inline-block" id="logout_form">
    {{ csrf_field() }}
    <!-- O uso do link ao invés do botao é para poder formatar corretamente -->
    <a onclick="document.getElementById('logout_form').submit(); return false;" class="login_logout_link" href>
        <i class="fas fa-sign-out-alt"></i> Sair
    </a>
</form>
@else
<a class="login_logout_link" href="{{ $logout_url }}">
    <i class="fas fa-sign-out-alt"></i> Sair
</a>
@endif
