<?php

    namespace App;

    class Helpers {


        public function __construct() {
            echo "se creo helpers";
        }


        




        private function getConfig() {
            require __DIR__."/config/web.php";
            return $config;
        }

    }

?>