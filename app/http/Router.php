<?php

namespace App\http;

class Router {

    private $config;

    public function __construct($config) {
        $this->config = $config;
    }

    public function getConfigRoute($url) {
        $rules = $this->config['components']['urlManager']['rules'];
        foreach($rules as $i => $rule) {
            if($rule['pattern'] == $url) {
                return $rule['route'];
            }
        }
        return false;
    }

}


