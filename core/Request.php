<?php

    namespace App\core;


    class Request {




        public function getPath() {
            $url = $_SERVER['REQUEST_URI'];
            $query_string_position = 0;
            if( strpos($url,'?') != false ) {
                $query_string_position = strpos($url,'?');
                $url = substr($url, 0, $query_string_position);
                return $url;
            }
            else {
                return $url;
            }
        }

        public function getMethod() {
            return strtolower($_SERVER['REQUEST_METHOD']);
        }
    }


?>