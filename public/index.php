<style>
        body {
            background-color: black;
        }
        * {
            color: white;
        }
    </style>

<?php

    require_once __DIR__."/../vendor/autoload.php";

    use App\core\Application;

    $application = new Application();

    $application->run();


?>