<?php

$admin = [
    [
        'text' => '<i class="fas fa-atom"></i>  SubItem 1',
        'url' => 'subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' =>  '/subitem2',
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
        'text' => '<i class="fas fa-cog"></i>',
        'title' => 'Configurações',
        'target' => '_blank',
        'url' => config('app.url') . '/item1',
        'align' => 'right',
    ],
];

# dashboard_url renomeado para app_url
# USP_THEME_SKIN deve ser colocado no .env da aplicação 

return [
    'title' => config('app.name'),
    'skin' => env('USP_THEME_SKIN', 'uspdev'),
    'app_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'menu' => $menu,
    'right_menu' => $right_menu,
];
