<?php

    namespace App\core;

    use App\core\http\Request;
    use App\core\http\Response;

    class Application {

        public static Helpers $app;

        public function __construct() {
            new Config();
            self::$app = new Helpers();
        }

        

        public static function run() {
            $request = new Request();
            $request->sendResponse();
        }

    }


?>