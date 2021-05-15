<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;


class SiteController extends Controller {


    public function actionHome() {

        if(!isset($_SESSION['user_id'])) {
            header("Location: /login");            
        }

        if(isset($_REQUEST['food_id'])) {
            
        }




        $url = "http://local.api-office-lunch/menu";
        $rest = new REST();
        $response = $rest->get($url);

        $menu = json_decode($response, true);


        $data = [
            'user_id' => $_SESSION['user_id'],
            'menu' => $menu,
        ];

        return $this->render('home', $data);

    }

    public function actionLogin() {

        $this->setLayout('login');

        if(isset($_SESSION['text'])) {
            if( !($_SESSION['text'] === "") ) {
                $text = $_SESSION['text'];
                $_SESSION['text'] = "";
                return $this->render( 'login', ['text' => $text] );
            }
            else {
                return $this->render('login');
            }
        }
        else {
            return $this->render('login');
        }

    }

    public function actionRegister() {

        $this->setLayout('login');

        if(isset($_SESSION['text'])) {
            if( !($_SESSION['text'] === "") ) {
                $text = $_SESSION['text'];
                $_SESSION['text'] = "";
                return $this->render( 'register', ['text' => $text] );
            }
            else {
                return $this->render('register');
            }
        }
        else {
            return $this->render('register');
        }
        
    }

}



?>