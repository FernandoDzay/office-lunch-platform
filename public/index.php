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

    use App\http\Request;

    $request = new Request();

    
    $request->send();


?>