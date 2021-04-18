<?php

    namespace App\core\http;

    class Response {

        protected $controller;
        protected $method;

        public function __construct($controller, $method) {
            $this->controller = ucfirst($controller);
            $this->method = ucfirst($method);
        }

        public function send() {
            
            $controllerClass = "App\controllers\\{$this->controller}Controller";
            $controllerMethod = "action$this->method";

            call_user_func([new $controllerClass, $controllerMethod]);
        }

    }

?>