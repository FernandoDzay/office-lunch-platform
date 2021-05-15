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
                [ 'pattern' => '/', 'route' => 'site/home'],
                [ 'pattern' => '/login', 'route' => 'site/login'],
                [ 'pattern' => '/register', 'route' => 'site/register'],
                [ 'pattern' => '/insert-food-of-the-day', 'route' => 'admin/inserttodaysfood'],
                [ 'pattern' => '/edit-food', 'route' => 'admin/editfood'],
                



                [ 'pattern' => '/login-user', 'route' => 'login/login'],
                [ 'pattern' => '/register-user', 'route' => 'login/register'],
            ],
        ]
    ]
];