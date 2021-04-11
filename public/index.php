<?php

    require_once(__DIR__."/../vendor/autoload.php");

    use App\core\Application;

    $app = new Application();


    /* $app->get('/', 'home');
    $app->get('/contact', 'contact'); */
    $app->get('/', function() {
        echo "home";
    });
    $app->get('/contact', function() {
        echo "contact";
    });

    //$app->printRouter();


    $app->run();
    
?>