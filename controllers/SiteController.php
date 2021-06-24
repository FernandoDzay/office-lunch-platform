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
        if(isset($_REQUEST['delete_order'])) {
            Application::$app->GlobalFunctions->deleteOrder( $_REQUEST['order_id'] );
            header("Location: /");
        }




        $menu = Application::$app->GlobalFunctions->getMenu();
        $extras = Application::$app->GlobalFunctions->getExtras();
        $orders = Application::$app->GlobalFunctions->getUserOrders();

        $data = [
            'user_id' => $_SESSION['user_id'],
            'menu' => $menu,
            'extras' => $extras,
            'orders' => $orders,
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