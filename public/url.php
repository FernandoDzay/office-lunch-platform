<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require_once __DIR__."/../vendor/autoload.php";
    use App\core\Config;


    $image = $_GET["image"];
    new Config();
    $base_url = Config::getBaseUrl();
    $image = $base_url . "/" .$image;
    //$image = "https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885__480.jpg";
    $fileFound = false;
	$ext = "";
	

    $imginfo = getimagesize($image);

    var_dump($imginfo);
    die();

	header("Content-type: {$imginfo['mime']}");
	header("Cache-Control: private, max-age=" . (365 * 24 * 60 * 60)); 
    readfile($image);
    
    header('Content-Type: image/jpeg');
    readfile($image);


?>