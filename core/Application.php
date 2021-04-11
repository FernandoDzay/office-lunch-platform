<?php
    namespace App\core;

    class Application {

        public Router $router;

        public function __construct() {
            $this->router = new Router();
        }



        public function run() {
            $this->router->resolve();
        }

        public function get($path, $callback) {
            $this->router->get($path, $callback);
        }

        public function printRouter() {
            $this->router->printRouter();
        }

    }




?>