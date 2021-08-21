<?php

namespace App\controllers;

use App\core\base\Controller;
use App\core\http\REST;
use App\models\Order;
use App\core\Application;


class AjaxController extends Controller {

    public function actionMakeorder() {

        $orders_data = Application::$app->GlobalFunctions->makeOrder();

        $orders_data['text'] = "";
        
        $one_execution = true;
        foreach($orders_data['orders'] as $key => $order) {
            if($one_execution && $order['is_extra'] == "1") {
                $orders_data['text'] .= "\n-- Adicionales:\n";
                $one_execution = false;
            }
            
            if($key + 1 != sizeof($orders_data['orders'])) {
                if($order['short_name'] == "") $orders_data['text'] .= $order['quantity'] . ' ' . $order['order_'] . "\n";
                else $orders_data['text'] .= $order['quantity'] . ' ' . $order['short_name'] . "\n";
                
            }
            else {
                if($order['short_name'] == "") $orders_data['text'] .= $order['quantity'] . ' ' . $order['order_'];
                else $orders_data['text'] .= $order['quantity'] . ' ' . $order['short_name'];
            }
        }

        echo json_encode($orders_data);
    }

    public function actionGetnotifications() {

        header('Content-type: application/json');

        if(!isset($_REQUEST['user_id'])) die();

        $user_id = $_REQUEST['user_id'];

        $rest = new REST();
        $url = "http://local.api-office-lunch/get-notifications";

        $notifications = $rest->get($url, ['user_id' => $user_id]);



        echo json_encode($notifications);
    }

    public function actionUpdatenotifications() {

        if( !isset($_POST['ids']) ) die();

        $ids = $_POST['ids'];


        $rest = new REST();
        $url = "http://local.api-office-lunch/update-notifications";
        $rest->put($url, ['ids' => $ids]);


    }




}
?>