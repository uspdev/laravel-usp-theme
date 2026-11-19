<a class="login_logout_link" href="{{ $login_url }}"
    @if (config('senhaunica.allowsLoginLocal') && \Illuminate\Support\Facades\Route::has('SenhaunicaLocalLoginAs'))
        data-toggle="modal" data-target="#usp-theme-login-modal" aria-haspopup="dialog" aria-controls="usp-theme-login-modal"
    @endif
>
    <i class="fas fa-sign-in-alt"></i> Entrar
</a>
