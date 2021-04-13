<?php

namespace App\http\Controllers;

use App\http\Controller;

class SiteController extends Controller {


    public function actionIndex() {

        $params = [
            'name' => 'luis',
            'lastname' => 'dzay',
        ];

        return $this->render('home', $params);
    }


}



?>