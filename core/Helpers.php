<?php

    namespace App\core;

    class Helpers {

        //public $classname;

        public function __construct() {
            $this->setFunctions();
            
            /* $classnameObject = "GlobalFunctions";
            $classname = "App\GlobalFunctions\\"."GlobalFunctions";
            
            $this->$classnameObject = new $classname(); */

        }


        public function getInstance() {
            $classname = "http\GlobalFunctions\\".$this->classname;

            return new $classname();
        }

        private function setFunctions() {
            $functions = Config::getFunctions();
            foreach($functions as $classname => $callback) {
                $this->$classname = new $callback['class'];
            }
        }


        



    }

?>