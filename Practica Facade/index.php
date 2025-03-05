<?php

function includeController($controlador)
{
    require_once "controllers/{$controlador}.php";
}


$pagina = $_GET["page"] ?? 'home';

$rutas = [
    'home' => 'homeController',
    'about' => 'aboutController',
    'contact' => 'contactController',
    'conversor'=> 'conversorController',
];

$controlador = $rutas[$pagina] ?? null;

if ($controlador) {
    
    includeController($controlador);

    $funcion = 'render';
    if (function_exists($funcion)) {
        $funcion();
    } else {
        http_response_code(404);
        echo "Página no encontrada";
    }
} else {
    http_response_code(404);
    echo "Página no encontrada";
}
