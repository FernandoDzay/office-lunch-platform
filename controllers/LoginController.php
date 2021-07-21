<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;
use App\core\Application;


class LoginController extends Controller {

    public function actionIndex() {

        return $this->render('home');
    }

    public function actionLogin() {

        if( !isset($_REQUEST['username']) || !isset($_REQUEST['password']) ) {
            header('Location: /login');
        }

        $url = "http://local.api-office-lunch/login";

        $token = Application::$app->GlobalFunctions->generateToken();

        $user = [
            'username' => $_REQUEST['username'],
            'password' => $_REQUEST['password'],
            'token' => $token,
        ];

        $rest = new REST();

        $response = $rest->post($url, $user);
        $response = json_decode($response, true);



        if( $response['response'] === "true") {
            $_SESSION['user_id'] = $response['user_id'];

            //set cookie
            setcookie('office_lunch_user_id', $response['user_id'], time() + 2678400);
            setcookie('office_lunch_token', $token, time() + 2678400);
            header('Location: /');
        }
        else {
            $_SESSION['login_error'] = true;
            header('Location: /login');
        }

    }

    public function actionRegister() {

        if( !isset($_REQUEST['username']) || !isset($_REQUEST['password']) || !isset($_REQUEST['birth_day']) || !isset($_REQUEST['birth_month']) ) {
            header('Location: /register');
        }

        $url = "http://local.api-office-lunch/register";


        $user = [
            'username' => $_REQUEST['username'],
            'password' => $_REQUEST['password'],
            'birth_month' => $_REQUEST['birth_month'],
            'birth_day' => $_REQUEST['birth_day']
        ];


        $rest = new REST();

        $response = $rest->post($url, $user);
        $response = json_decode($response, true);

        
        if(isset($response['response'])) {
            if( $response['response'] === "true") {
                $_SESSION['register_success'] = true;
                header('Location: /login');
            }
            else {
                $_SESSION['register_error'] = true;
                header('Location: /register');
            }
        }
        else {
            header('Location: /register');
        }
        

    }

    public function actionLogout() {

        setcookie('office_lunch_user_id', $response['user_id'], time() - 3600);
        setcookie('office_lunch_token', $token, time() - 3600);
        $_SESSION['user_id'] = "";

        header('Location: /login');
    }

}



?>