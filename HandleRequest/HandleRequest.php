<?php

    namespace App\HandleRequest;

    use App\core\http\Response;

    class HandleRequest {

        protected Response $response;
        protected $controller;
        protected $method;

        public function __construct() {
            $this->response = new Response();
            $this->controller = "App\Controllers\SiteController";
            $this->method = "actionLogin";
        }



        public function run() {

            if($_SERVER['REQUEST_URI'] == "/login" || $_SERVER['REQUEST_URI'] == "/register") {
                return true;
            }

            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != "") {
                return true;
            }
            else {
                header('Location: /login');
                return true;
            }
            //$this->response->executeController($this->controller, $this->method);
            return true;
        }



    }



?>