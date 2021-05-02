<?php

require "db.php";

$config = [
    'layout' => 'main',
    'db' => $db,
    'backendApi' => false,
    'components' => [
        'functions' => [
            'GlobalFunctions' => [ 'class' => 'App\GlobalFunctions\GlobalFunctions'],
            'DataBaseFunctions' => [ 'class' => 'App\GlobalFunctions\DataBaseFunctions'],
            'Prueba' => [ 'class' => 'App\GlobalFunctions\Prueba'],
        ],
        'urlManager' => [
            'rules' => [
                [ 'pattern' => '/', 'route' => 'site/index', 'defaults' => ['code' => 'login']],
                [ 'pattern' => '/login', 'route' => 'site/login', 'defaults' => ['code' => 'login']],
            ],
        ]
    ]
];