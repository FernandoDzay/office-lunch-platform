<?php

namespace App\controllers;

use App\core\base\Controller;


class SiteController extends Controller {



    


    public function actionIndex() {

    
        return $this->render('home');
    }

    public function actionLogin() {

        $this->setLayout('login');


        
    
        return $this->render('login');
    }

}



?>