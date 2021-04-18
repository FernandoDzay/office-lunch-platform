<?php

namespace App\core\base;

use App\core\Config;
use App\core\Application;

class Controller {

    protected $config;
    protected $layout;

    public function __construct() {

    }

    

    public function setLayout($layout) {
        $this->layout = $layout;
    }



    public function render($view, array $params = []) {

        $content = $this->getViewFile($view, $params);

        return $this->printLayout($content);
    }





    
    private function getViewFile($view, $params) {
        if( !empty($params) ) {
            foreach($params as $i => $param) {
                $$i = $param;
            }
        }

        ob_start();
        require __DIR__."/../../views/site/$view.php";
        return ob_get_clean();
    }

    private function printLayout($content) {
        ob_start();

        if( isset($this->$layout) ) {
            require __DIR__."/../../views/layouts/$this->layout.php";
        }
        else {
            require __DIR__."/../../views/layouts/".Config::getLayout().".php";
        }
        return ob_get_contents();
    }
    
}



?>