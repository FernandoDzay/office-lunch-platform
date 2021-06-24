<?php

    namespace App\GlobalFunctions;

    use App\core\http\REST;

    class HeaderFunctions {


        public function getHeaderData() {

            $data = [
                'username' => $this->getUserName(),
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


    }





?>