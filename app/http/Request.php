<?php

namespace App\http;

class Request {

    protected Response $response;
    protected Router $router;
    protected $config;
    protected $controller;
    protected $method;


    public function __construct() {
        $this->setConfig();
        $this->router = new Router($this->config);
        $this->setController();
        $this->setMethod();
        $this->response = new Response($this->controller, $this->method);
    }



    public function setConfig() {
        require __DIR__."/../config/web.php";
        $this->config = $config;
    }

    public function setController() {
        $route = $this->router->getConfigRoute( $this->getUrl() );
        if( is_string($route) ) {
            $this->controller = explode("/", $route)[0];
        }
        else {
            echo "<h1>Not found</h1>";
            die();
        }
    }
    
    public function setMethod() {
        $route = $this->router->getConfigRoute( $this->getUrl() );
        if( is_string($route) ) {
            $this->method = explode("/", $route)[1];
        }
        else {
            echo "<h1>Not found</h1>";
            die();
        }
    }

    public function getUrl() {
        $strpos = strpos($_SERVER["REQUEST_URI"], "?");

        if( $strpos != false ) {
            $url = substr($_SERVER["REQUEST_URI"], 0, $strpos);
            return $url;
        }
        else {
            $url = $_SERVER["REQUEST_URI"];
            return $url;
        }
    }



    public function send() {
        $this->response->send();
    }

}
