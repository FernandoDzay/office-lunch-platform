<?php

    namespace App\http;

    class Response {

        protected $controller;
        protected $method;

        public function __construct($controller, $method) {
            $this->controller = ucfirst($controller);
            $this->method = ucfirst($method);
        }

        public function send() {
            
            $controllerClass = "App\http\Controllers\\{$this->controller}Controller";
            $controllerMethod = "action$this->method";

            call_user_func([new $controllerClass, $controllerMethod]);
        }

    }

?>