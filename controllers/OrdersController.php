<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;
use App\core\Application;


class OrdersController extends Controller {

    public function actionMyweekorders() {

        $orders = Application::$app->GlobalFunctions->getMyWeekOrders();

        return $this->render('my-week-orders', ['orders' => $orders]);
    }

    public function actionWeekorders() {

        $orders = Application::$app->GlobalFunctions->getWeekOrders();

        $users = [];

        foreach($orders as $key => $days) {
            foreach($days as $name => $values) {
                if( !in_array($name, $users) ) {
                    array_push($users, $name);
                }
            }
        }

        return $this->render('week-orders', ['orders' => $orders]);
    }





}
?>