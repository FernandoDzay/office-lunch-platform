<?php

    namespace App;

    class Helpers {

        public $classname;

        public function __construct() {

            $classnameObject = "GlobalFunctions";
            $classname = "App\http\GlobalFunctions\\"."GlobalFunctions";
            
            $this->$classnameObject = new $classname();

        }


        public function getInstance() {
            $classname = "http\GlobalFunctions\\".$this->classname;

            return new $classname();
        }


        




        private function getConfig() {
            require __DIR__."/config/web.php";
            return $config;
        }

    }

?>