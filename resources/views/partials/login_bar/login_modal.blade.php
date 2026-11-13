<div class="modal fade" id="usp-theme-login-modal" tabindex="-1" role="dialog"
    aria-labelledby="usp-theme-login-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title font-weight-bold" id="usp-theme-login-modal-title">Entrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <a class="btn btn-primary btn-block py-2 font-weight-bold shadow-sm" href="{{ $login_url }}">
                    <i class="fas fa-key mr-2" aria-hidden="true"></i> Entrar com Senha Única USP
                </a>

                <div class="d-flex align-items-center my-4 text-muted">
                    <span class="flex-grow-1 border-top" aria-hidden="true"></span>
                    <span class="mx-3 small font-weight-bold">OU</span>
                    <span class="flex-grow-1 border-top" aria-hidden="true"></span>
                </div>

                <form id="usp-theme-login-form" class="bg-light border rounded p-4 shadow-sm" method="POST" action="{{ parse_url(route('SenhaunicaLocalLoginAs'), PHP_URL_PATH) }}">
                    @csrf
                    <h6 class="text-muted font-weight-bold mb-3">Entrar com Login Local</h6>
                    <div class="form-group mb-3">
                        <label class="small font-weight-bold" for="usp-theme-login-email">E-mail</label>
                        <input type="email" class="form-control" id="usp-theme-login-email" name="email"
                            value="{{ old('email') }}" autocomplete="username" required>
                    </div>
                    <div class="form-group">
                        <label class="small font-weight-bold" for="usp-theme-login-password">Senha</label>
                        <input type="password" class="form-control" id="usp-theme-login-password" name="password"
                            autocomplete="current-password" required>
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-block font-weight-bold mt-4">
                        <i class="fas fa-sign-in-alt mr-2" aria-hidden="true"></i> Acessar
                    </button>
                </form>
                <div class="text-right mt-4">
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('usp-theme-login-form').addEventListener('submit', async function (event) {
        event.preventDefault();

        const form = event.currentTarget;
        const response = await fetch(form.action, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'same-origin',
            redirect: 'manual',
            body: new FormData(form)
        });

        // Com Accept: application/json, a validação retorna 422; o sucesso
        // do controller original retorna 302, exposto pelo fetch como opaqueredirect.
        if (response.type === 'opaqueredirect') {
            window.location.assign(new URL('./', form.action).href);
        }
    });
</script>
