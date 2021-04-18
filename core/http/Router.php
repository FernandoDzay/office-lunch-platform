<?php

namespace App\core\http;

use App\core\Config;

class Router {

    public function getRoute($url) {
        $rules = Config::getRules();
        foreach($rules as $i => $rule) {
            if($rule['pattern'] == $url) {
                return $rule['route'];
            }
        }
        return false;
    }

}


