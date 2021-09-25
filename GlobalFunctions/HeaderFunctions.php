<?php

    namespace App\GlobalFunctions;

    use App\core\http\REST;

    class HeaderFunctions extends GlobalFunctions {


        public function getHeaderData() {

            $user = $this->getUser();

            $data = [
                'username' => $user['username'],
                'user_orders' => $this->getUserOrders(),
                'lunch_hour' => $this->getLunchHour(),
                'image' => $user['image'],
                'is_admin' => (int)$user['is_admin'],
            ];

            return $data;
        }



        //----------
        public function getUser() {

            $url = "/get-user";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $user = json_decode($response, true);

            return $user;
        }

        public function getLunchHour() {
            $url = "/get-lunch-hour";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $lunch_hour = json_decode($response, true);

            return $lunch_hour;
        }

        public function getUserAvatar() {
            $url = "/get-lunch-hour";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $lunch_hour = json_decode($response, true);

            return $lunch_hour;
        }


    }





?>