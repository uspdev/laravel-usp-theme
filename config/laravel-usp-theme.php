<?php

$submenu1 = [
    [
        'text' => '<i class="fas fa-atom"></i>  SubItem 1',
        'url' => config('app.url') . '/subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => config('app.url') . '/subitem2',
        'can' => 'admin',
    ],
    [
        'text' => 'SubItem 3',
        'url' => config('app.url') . '/subitem3',
    ],
];

$submenu2 = [
    [
        'text' => 'SubItem 1',
        'url' => config('app.url') . '/subitem1',
    ],
    [
        'text' => 'SubItem 2',
        'url' => config('app.url') . '/subitem2',
        'can' => 'admin',
    ],
];

return [
    'title' => config('app.name'),
    'dashboard_url' => config('app.url'),
    'logout_method' => 'POST',
    'logout_url' => config('app.url') . '/logout',
    'login_url' => config('app.url') . '/login',
    'menu' => [
        [
            'text' => '<i class="fas fa-home"></i> Item 1',
            'url' => config('app.url') . '/item1',
        ],
        [
            'text' => 'Item 2',
            'url' => config('app.url') . '/item2',
            'can' => '',
        ],
        [
            'text' => 'Item 3',
            'url' => config('app.url') . '/item3',
            'can' => 'admin',
        ],
        [
            'text' => 'SubMenu1',
            'submenu' => $submenu1,
        ],
        [
            'text' => 'SubMenu2',
            'submenu' => $submenu2,
            'can' => 'admin',
        ],
    ],
    'right_menu' => [
        [
            'text' => '<i class="fas fa-cog"></i>',
            'title' => 'Configurações',
            'target' => '_blank',
            'url' => config('app.url') . '/item1',
        ],
    ],
];
