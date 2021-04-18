<?php

    namespace App\core;

    class Config {

        private static $config;

        public function __construct() {
            $this->setConfig();
        }


        public static function getRules() {
            return self::$config['components']['urlManager']['rules'];
        }

        public static function getLayout () {
            return self::$config['layout'];
        }


        private function setConfig() {
            ob_start();
            require __DIR__."/../config/web.php";
            self::$config = $config;
            ob_clean();
        }



    }