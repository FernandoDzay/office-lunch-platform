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

        public static function getFunctions() {
            return self::$config['components']['functions'];
        }

        public static function beforeRequestIsSet() {
            return (isset(self::$config['beforeRequest']) && self::$config['beforeRequest'] != '');
        }

        public static function getDbParameters() {
            if( isset(self::$config['db']) ) {
                return self::$config['db'];
            }
            else {
                return false;
            }
        }

        public static function getBackendApi() {
            return self::$config['backendApi'];
        }

        public static function getBaseUrl() {
            if( self::$config['dev'] == true ) {
                return self::$config['dev_url'];
            }
            else if( self::$config['dev'] == false ) {
                return self::$config['prod_url'];
            }
            else {
                return "";
            }
        }


        private function setConfig() {
            date_default_timezone_set('America/Merida');
            ob_start();
            require __DIR__."/../config/web.php";
            self::$config = $config;
            ob_clean();
        }
        



    }