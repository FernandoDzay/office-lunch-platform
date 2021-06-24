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
            'HeaderFunctions' => [ 'class' => 'App\GlobalFunctions\HeaderFunctions'],
        ],
        'urlManager' => [
            'rules' => [
                [ 'pattern' => '/', 'route' => 'site/home'],
                [ 'pattern' => '/login', 'route' => 'site/login'],
                [ 'pattern' => '/register', 'route' => 'site/register'],
                [ 'pattern' => '/insert-food-of-the-day', 'route' => 'admin/inserttodaysfood'],
                [ 'pattern' => '/insert-extras', 'route' => 'admin/insertextras'],
                [ 'pattern' => '/edit-food', 'route' => 'admin/editfood'],
                [ 'pattern' => '/edit-extra', 'route' => 'admin/editextra'],
                [ 'pattern' => '/groups', 'route' => 'admin/groups'],
                



                [ 'pattern' => '/login-user', 'route' => 'login/login'],
                [ 'pattern' => '/register-user', 'route' => 'login/register'],
            ],
        ]
    ]
];