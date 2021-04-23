<?php


$config = [
    'layout' => 'main',
    'components' => [
        'functions' => [
            'GlobalFunctions' => [ 'class' => 'App\GlobalFunctions\GlobalFunctions'],
            'DataBaseFunctions' => [ 'class' => 'App\GlobalFunctions\DataBaseFunctions'],
            'Prueba' => [ 'class' => 'App\GlobalFunctions\Prueba'],
        ],
        'urlManager' => [
            'rules' => [
                [ 'pattern' => '/', 'route' => 'site/index'],
                [ 'pattern' => '/login', 'route' => 'site/login'],
            ],
        ]
    ]
];