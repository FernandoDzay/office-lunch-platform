<?php


$config = [
    'layout' => 'main',
    'components' => [
        'urlManager' => [
            'rules' => [
                [ 'pattern' => '/', 'route' => 'site/index', 'defaults' => ['code' => 'home']],
                [ 'pattern' => '/contact', 'route' => 'contact/index', 'defaults' => ['code' => 'home']],
                [ 'pattern' => '/tours', 'route' => 'tours/index', 'defaults' => ['code' => 'home']],
            ],
        ]
    ]
];