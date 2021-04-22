<?php

namespace App\controllers;

use App\core\base\Controller;

class SiteController extends Controller {


    public function actionIndex() {

        $params = [
            'name' => 'luis',
            'lastname' => 'dzay',
        ];

        return $this->render('home', $params);
    }

    public function actionLogin() {

        return $this->render('login');
    }


}



?>