<?php
$prefix = 'USP_THEME_SISTEMAS';
$sistemas = [];
foreach ($_ENV as $key => $value) {
    if (strpos($key, $prefix) !== false) {
        $sistemas[] = json_decode($value, true);
    }
}

return [
    'sistemas' => $sistemas,
];
