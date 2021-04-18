<?php

    namespace App\http;

    use App\Helpers;


    class Application {

        
        public static Helpers $app;

        public function __construct() {
            self::$app = new Helpers();
        }

        

        public static function run() {
            $request = new Request();
            $request->sendResponse();
        }

    }


?>