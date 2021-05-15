<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;


class LoginController extends Controller {

    public function actionIndex() {

        return $this->render('home');
    }

    public function actionLogin() {

        if( !isset($_REQUEST['username']) || !isset($_REQUEST['password']) ) {
            //$_SESSION['text'] = "Ocurrió un error";
            header('Location: /login');
        }


        $url = "http://local.api-office-lunch/login";

        $user = [
            'username' => $_REQUEST['username'],
            'password' => $_REQUEST['password'],
        ];

        $rest = new REST();

        $response = $rest->post($url, $user);
        $response = json_decode($response, true);



        if( $response['response'] === "true") {
            $_SESSION['logged_in'] = true;
            $_SESSION['text'] = "";
            $_SESSION['user_id'] = $response['user_id'];
            header('Location: /');
        }
        else {
            $_SESSION['text'] = "Usuario o contraseña incorrecta";
            header('Location: /login');
        }

    }



    public function actionRegister() {

        if( !isset($_REQUEST['username']) || !isset($_REQUEST['password']) ) {
            //$_SESSION['text'] = "Ocurrió un error";
            header('Location: /register');
        }

        $url = "http://local.api-office-lunch/register";


        $user = [
            'username' => $_REQUEST['username'],
            'password' => $_REQUEST['password'],
        ];


        $rest = new REST();

        $response = $rest->post($url, $user);
        $response = json_decode($response, true);

        

        
        if( $response['response'] === "true") {
            $_SESSION['text'] = "";
            header('Location: /login');
        }
        else {
            $_SESSION['text'] = "Ese usuario ya existe";
            header('Location: /register');
        }

    }

}



?>