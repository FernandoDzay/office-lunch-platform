<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;
use App\core\Application;


class SiteController extends Controller {


    public function actionHome() {

        if(!isset($_SESSION['user_id'])) {
            header("Location: /login");
        }

        if(isset($_REQUEST['add_food'])) {
            Application::$app->GlobalFunctions->addUserOrder( $_SESSION['user_id'], $_REQUEST['food'] );
            header("Location: /");
        }
        if(isset($_REQUEST['add_extra'])) {
            Application::$app->GlobalFunctions->addUserOrder( $_SESSION['user_id'], $_REQUEST['extra'], 1 );
            header("Location: /");
        }


        $menu = Application::$app->GlobalFunctions->getMenu();
        $extras = Application::$app->GlobalFunctions->getExtras();

        $data = [
            'user_id' => $_SESSION['user_id'],
            'menu' => $menu,
            'extras' => $extras,
        ];

        return $this->render('home', $data);

    }

    public function actionLogin() {

        if( isset($_COOKIE['office_lunch_user_id']) && isset($_COOKIE['office_lunch_token']) ) {
            $url = "http://local.api-office-lunch/token-login";

            $user = [
                'id' => $_COOKIE['office_lunch_user_id'],
                'token' => $_COOKIE['office_lunch_token']
            ];
            $rest = new REST();

            $response = $rest->post($url, $user);
            $response = json_decode($response, true);

            if( $response['response'] === "true") {
                $_SESSION['user_id'] = $response['user_id'];
                header('Location: /');
            }

        }


        $this->setLayout('login');

        if(isset($_SESSION['register_success'])) {
            if($_SESSION['register_success'] === true) {
                $_SESSION['register_success'] = false;
                return $this->render( 'login', ['register_success' => true] );
            }
        }
        if(isset($_SESSION['login_error'])) {
            if($_SESSION['login_error'] === true) {
                $_SESSION['login_error'] = false;
                return $this->render( 'login', ['login_error' => true] );
            }
        }

        return $this->render('login');
    }

    public function actionRegister() {

        $this->setLayout('login');

        if(isset($_SESSION['register_error'])) {
            if($_SESSION['register_error'] === true) {
                $_SESSION['register_error'] = false;
                return $this->render( 'register', ['register_error' => true] );
            }
            return $this->render('register');
        }
        else {
            return $this->render('register');
        }
        
    }

    public function actionTodaysorder() {

        if(isset($_REQUEST['delete_order'])) {
            Application::$app->GlobalFunctions->deleteOrder( $_REQUEST['order_id'] );
        }

        $orders = Application::$app->GlobalFunctions->getUserOrders();

        return $this->render('todays-order', ['orders' => $orders]);
    }

    public function actionTest() {

        echo "<pre>";
        print_r($_FILES);
        die();
        

        return;
    }

}



?>