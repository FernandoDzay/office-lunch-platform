<?php

    namespace App\core;

    class Router {

        public array $router;
        public $request;

        public function __construct() {
            $this->request = new Request();
            $this->router = [];
        }

        public function resolve() {

            $path = $this->request->getPath();
            $method = $this->request->getMethod();

            $callback = $this->router[$method][$path];

            call_user_func($callback);
        }


        public function get($path, $callback) {
            $this->router['get'][$path] = $callback;
        }

        public function printRouter() {
            echo "<pre>";
            print_r($this->router);
            die();
        }




    }



?>