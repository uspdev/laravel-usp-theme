<?php
# lista de skins disponíveis no theme

$skins = array_map('basename', glob(__DIR__ . '/../resources/views/partials/skins/*', GLOB_ONLYDIR));

return [
    'available-skins' => $skins,
];

