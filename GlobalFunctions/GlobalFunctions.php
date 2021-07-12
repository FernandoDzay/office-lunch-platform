<?php


    namespace App\GlobalFunctions;

    use App\core\http\REST;


    class GlobalFunctions {

        public function __construct() {
            
        }


        public function getMenu() {

            $url = "http://local.api-office-lunch/menu";
            $rest = new REST();
            $response = $rest->get($url);

            $menu = json_decode($response, true);

            return $menu;
        }

        public function getExtras() {

            $url = "http://local.api-office-lunch/get-extras";
            $rest = new REST();
            $response = $rest->get($url);

            $extras = json_decode($response, true);

            return $extras;
        }

        public function getUserOrders() {

            $url = "http://local.api-office-lunch/orders/get-by-user";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $orders = json_decode($response, true);

            return $orders;
        }

        public function addUserOrder($user_id, $order, $is_extra = null) {
            $url = "http://local.api-office-lunch/orders/add";
            $rest = new REST();

            $data = [
                'user_id' => $user_id,
                'order' => $order,
            ];
            if($is_extra != null) {
                $data['is_extra'] = $is_extra;
            }

            $response = $rest->post($url, $data);
        }

        public function deleteOrder($order_id) {

            $url = "http://local.api-office-lunch/orders/delete";
            $rest = new REST();
            $rest->delete($url, ['order_id' => $order_id]);

        }

        public function getUsers() {
            $rest = new REST();
            $url = "http://local.api-office-lunch/get-users";

            $users = $rest->get($url);

            return json_decode($users, true);
        }

        public function getGroups() {
            $rest = new REST();
            $url = "http://local.api-office-lunch/get-groups";

            $groups = $rest->get($url);

            return json_decode($groups, true);
        }

        public function addUserGroup($user_id, $group_id) {
            $rest = new REST();

            $url_post = "http://local.api-office-lunch/set-user-group";
            $url_update = "http://local.api-office-lunch/update-user-group";

            if($this->userHasGroup($user_id)) {
                $rest->put($url_update, ['user_id' => $user_id, 'group_id' => $group_id],);
            }
            else {
                $rest->post($url_post, ['user_id' => $user_id, 'group_id' => $group_id]);
            }
        }

        public function getGroupsTablesData() {
            $rest = new REST();
            $url = "http://local.api-office-lunch/groups-data";

            $data = $rest->get($url);

            return json_decode($data, true);
        }

        public function getMyWeekOrders() {
            $rest = new REST();
            $url = "http://local.api-office-lunch/get-week-orders-by-user";

            $data = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            return json_decode($data, true);
        }

        public function getWeekOrders() {
            $rest = new REST();
            $url = "http://local.api-office-lunch/get-week-orders";

            $data = $rest->get($url);

            return json_decode($data, true);
        }



        //---------------

        private function userHasGroup($user_id) {
            $rest = new REST();
            $url = "http://local.api-office-lunch/user-has-group";

            $res = json_decode( $rest->get($url, ['user_id' => $user_id]), true);

            if( $res['status'] == "1" ) return true;
            else return false;

        }




    }

