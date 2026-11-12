<?php

$admin = [
    [
        'text' => '<i class="fas fa-atom"></i>  SubItem 1',
        'url' => 'subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => '/subitem2',
        'can' => 'admin',
    ],
    [
        'type' => 'divider',
    ],
    [
        'type' => 'header',
        'text' => 'Cabeçalho',
    ],
    [
        'text' => 'SubItem 3',
        'url' => 'subitem3',
    ],
];

$submenu2 = [
    [
        'text' => 'SubItem 1',
        'url' => 'subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => 'subitem2',
        'can' => 'admin',
    ],
];

$menu = [
    [
        'text' => '<i class="fas fa-home"></i> Home',
        'url' => 'home',
    ],
    [
        # este item de menu será substituido no momento da renderização
        'key' => 'menu_dinamico',
    ],
    [
        'text' => 'Drop Down',
        'submenu' => $submenu2,
        'can' => '',
    ],
    [
        'text' => 'Está logado',
        'url' => config('app.url') . '/logado', // com caminho absoluto
        'can' => 'user',
    ],
    [
        'text' => 'Menu gerente',
        'url' => 'gerente',
        'can' => 'gerente',
    ],
    [
        'text' => 'Menu admin',
        'submenu' => $admin,
        'can' => 'admin',
    ],
];

$right_menu = [
    [
        // menu utilizado para views da biblioteca senhaunica-socialite.
        'key' => 'senhaunica-socialite',
    ],
    [
        'key' => 'laravel-tools',
    ],
    [
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/item1',
        'align' => 'right',
    ],
];

$cadastrosAuxiliaresUrl = rtrim((string) env('CADASTROS_AUXILIARES_URL', ''), '/');
$cadastrosAuxiliaresMensagensEndpoint = $cadastrosAuxiliaresUrl !== ''
    ? $cadastrosAuxiliaresUrl . '/api/mensagens'
    : '';

return [
    # valor default para a tag title, dentro da section title.
    # valor pode ser substituido pela aplicação.
    'title' => config('app.name'),

    # USP_THEME_SKIN deve ser colocado no .env da aplicação
    'skin' => env('USP_THEME_SKIN', 'uspdev'),

    # chave da sessão. Troque em caso de colisão com outra variável de sessão.
    'session_key' => 'laravel-usp-theme',

    # usado na tag base, permite usar caminhos relativos nos menus e demais elementos html
    # na versão 1 era dashboard_url
    'app_url' => config('app.url'),

    # login e logout
    'logout_method' => 'POST',
    'logout_url' => 'logout',
    'login_url' => 'login',
    # opção de login local, habilitada no .env da aplicação consumidora
    'login_local' => env('USP_THEME_LOGIN_LOCAL', false),

    # menus
    'menu' => $menu,
    'right_menu' => $right_menu,

    # mensagens flash - https://uspdev.github.io/laravel#31-mensagens-flash
    'mensagensFlash' => false,

    # integração opcional com endpoint de mensagens do cadastros-auxiliares
    'cadastros_auxiliares_mensagens_integracao' => env('CADASTROS_AUXILIARES_MENSAGENS_INTEGRACAO', false),
    'cadastros_auxiliares_mensagens_endpoint_url' => env('CADASTROS_AUXILIARES_MENSAGENS_ENDPOINT_URL', $cadastrosAuxiliaresMensagensEndpoint),
    'cadastros_auxiliares_mensagens_sistema' => env('CADASTROS_AUXILIARES_SISTEMA_NAME', ''),
    'cadastros_auxiliares_mensagens_limite' => (int) env('CADASTROS_AUXILIARES_MENSAGENS_LIMITE', 5),
    'cadastros_auxiliares_mensagens_timeout' => (int) env('CADASTROS_AUXILIARES_MENSAGENS_TIMEOUT', 5),
    'cadastros_auxiliares_mensagens_refresh' => (int) env('CADASTROS_AUXILIARES_MENSAGENS_REFRESH', 30),
    'cadastros_auxiliares_password' => env('CADASTROS_AUXILIARES_PASSWORD', ''),

    # container ou container-fluid
    'container' => 'container-fluid',

];
