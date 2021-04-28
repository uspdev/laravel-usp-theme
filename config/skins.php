<?php
# lista de skins disponíveis no theme

chdir(__DIR__ . '/../resources/views/partials/skins');
$skins = glob('*', GLOB_ONLYDIR);
return [
    'available-skins' => $skins,
];
