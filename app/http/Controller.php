<?php

namespace App\http;

class Controller {

    protected $config;
    protected $layout;

    public function __construct() {
        require __DIR__."/../config/web.php";
        $this->config = $config;
    }

    

    public function setLayout($layout) {
        $this->layout = $layout;
    }

    private function getConfigLayout() {
        return $this->config['layout'];
    }



    public function render($view, array $params = []) {
        if( !empty($params) ) {
            foreach($params as $i => $param) {
                $$i = $param;
            }
        }

        ob_start();
        require __DIR__."/../../views/site/$view.php";
        $content = ob_get_clean();

        ob_start();
        if( isset($this->layout) ) {
            require __DIR__."/../../views/layouts/$this->layout.php";
        }
        else {
            require __DIR__."/../../views/layouts/".$this->getConfigLayout().".php";
        }

        return ob_get_clean();
    }








    
    /* private function getViewFile($view) {
        ob_start();

        require __DIR__."/../../views/site/$view.php";

        return ob_get_clean();
    }
    private function getLayoutFile($name) {
        ob_start();

        if( isset($this->layout) ) {
            require __DIR__."/../../views/layouts/$this->layout.php";
        }
        else {
            require __DIR__."/../../views/layouts/".$this->getConfigLayout().".php";
        }
        return ob_get_clean();
    } */
    
}



?>