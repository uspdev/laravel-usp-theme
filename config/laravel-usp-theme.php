<?php

return [
    'title'=> 'USPdev',
    'menu' => [
        [
            'text' => 'Item 1',
            'url'  => '/item1',
        ],
        [
            'text' => 'Item 2',
            'url'  => '/item2',
        ],
        [
            'text' => 'Item 3',
            'url'  => '/item3',
            'can'  => 'admin',
        ],
    ]
];
