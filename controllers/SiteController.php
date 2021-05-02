<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;


class SiteController extends Controller {



    


    public function actionIndex() {

        $url = "http://local.api-office-lunch/";

        $params = [
            'username' => "pedros",
        ];

        $rest = new REST();

        echo $rest->delete($url, $params);
    

        die();
        return $this->render('home');
    }

    public function actionLogin() {

        $this->setLayout('login');


        
    
        return $this->render('login');
    }

}



?>