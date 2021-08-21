<?php

    namespace App\GlobalFunctions;

    use App\core\http\REST;

    class HeaderFunctions extends GlobalFunctions {


        public function getHeaderData() {

            $data = [
                'username' => $this->getUserName(),
                'user_orders' => $this->getUserOrders(),
                'lunch_hour' => $this->getLunchHour(),
            ];

            return $data;
        }



        //----------
        public function getUserName() {

            $url = "http://local.api-office-lunch/get-username";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $user = json_decode($response, true);

            return $user;
        }

        public function getLunchHour() {
            $url = "http://local.api-office-lunch/get-lunch-hour";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $lunch_hour = json_decode($response, true);

            return $lunch_hour;
        }


    }





?>