<?php

require "db.php";

$config = [
    'layout' => 'main',
    'db' => $db,
    'backendApi' => false,
    'dev' => true,
    'prod_url' => "https://",
    'dev_url' => "http://local.api-office-lunch",
    'components' => [
        'functions' => [
            'GlobalFunctions' => [ 'class' => 'App\GlobalFunctions\GlobalFunctions'],
            'DataBaseFunctions' => [ 'class' => 'App\GlobalFunctions\DataBaseFunctions'],
            'HeaderFunctions' => [ 'class' => 'App\GlobalFunctions\HeaderFunctions'],
        ],
        'urlManager' => [
            'rules' => [


                //  SITE
                [ 'pattern' => '/', 'route' => 'site/home'],
                [ 'pattern' => '/test', 'route' => 'site/test'],
                [ 'pattern' => '/login', 'route' => 'site/login'], 
                [ 'pattern' => '/register', 'route' => 'site/register'],
                [ 'pattern' => '/todays-order', 'route' => 'site/todaysorder'],


                // ORDERS
                [ 'pattern' => '/my-week-orders', 'route' => 'orders/myweekorders'],
                [ 'pattern' => '/week-orders', 'route' => 'orders/weekorders'],
                
                
                //  ADMIN
                [ 'pattern' => '/insert-food-of-the-day', 'route' => 'admin/inserttodaysfood'],
                [ 'pattern' => '/insert-extras', 'route' => 'admin/insertextras'],
                [ 'pattern' => '/edit-food', 'route' => 'admin/editfood'],
                [ 'pattern' => '/edit-extra', 'route' => 'admin/editextra'],
                [ 'pattern' => '/groups', 'route' => 'admin/groups'],
                [ 'pattern' => '/payments', 'route' => 'admin/payments'],
                

                // AJAX
                [ 'pattern' => '/make-order', 'route' => 'ajax/makeorder'],
                [ 'pattern' => '/get-notifications', 'route' => 'ajax/getnotifications'],
                [ 'pattern' => '/update-notifications', 'route' => 'ajax/updatenotifications'],
                [ 'pattern' => '/change-user-image', 'route' => 'ajax/changeimage'],
                
                


                // LOGIN
                [ 'pattern' => '/login-user', 'route' => 'login/login'],
                [ 'pattern' => '/register-user', 'route' => 'login/register'],
                [ 'pattern' => '/logout', 'route' => 'login/logout'], 
            ],
        ]
    ]
];