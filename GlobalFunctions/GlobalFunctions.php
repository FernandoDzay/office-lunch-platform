<?php


    namespace App\GlobalFunctions;

    use App\core\http\REST;


    class GlobalFunctions {

        public function __construct() {
            
        }

        public function generateToken() {
            $random_bytes = random_bytes(16);
            $token = bin2hex($random_bytes);
            return $token;
        }

        public function getMenu() {

            $url = "/menu";
            $rest = new REST();
            $response = $rest->get($url);

            $menu = json_decode($response, true);

            return $menu;
        }

        public function getExtras() {

            $url = "/get-extras";
            $rest = new REST();
            $response = $rest->get($url);

            $extras = json_decode($response, true);

            return $extras;
        }

        public function getUserOrders() {

            $url = "/orders/get-by-user";
            $rest = new REST();
            $response = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            $orders = json_decode($response, true);

            return $orders;
        }

        public function addUserOrder($user_id, $order, $is_extra = null) {
            $url = "/orders/add";
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

            $url = "/orders/delete";
            $rest = new REST();
            $rest->delete($url, ['order_id' => $order_id]);

        }

        public function getUsers() {
            $rest = new REST();
            $url = "/get-users";

            $users = $rest->get($url);

            return json_decode($users, true);
        }

        public function getGroups() {
            $rest = new REST();
            $url = "/get-groups";

            $groups = $rest->get($url);

            return json_decode($groups, true);
        }

        public function addUserGroup($user_id, $group_id) {
            $rest = new REST();

            $url_post = "/set-user-group";
            $url_update = "/update-user-group";

            if($this->userHasGroup($user_id)) {
                $rest->put($url_update, ['user_id' => $user_id, 'group_id' => $group_id],);
            }
            else {
                $rest->post($url_post, ['user_id' => $user_id, 'group_id' => $group_id]);
            }
        }

        public function removeUserGroup($user_id) {

            $rest = new REST();

            $url = "/remove-user-group";

            $rest->delete($url, ['user_id' => $user_id]);
        }

        public function getGroupsTablesData() {
            $rest = new REST();
            $url = "/groups-data";

            $data = $rest->get($url);

            return json_decode($data, true);
        }

        public function getMyWeekOrders() {
            $rest = new REST();
            $url = "/get-week-orders-by-user";

            if( isset($_REQUEST['date']) ) $data = $rest->get($url, ['date' => $_REQUEST['date'], 'user_id' => $_SESSION['user_id']]);
            else $data = $rest->get($url, ['user_id' => $_SESSION['user_id']]);

            return json_decode($data, true);
        }

        public function getWeekOrders() {
            $rest = new REST();
            $url = "/get-week-orders";

            if( isset($_REQUEST['date']) ) $data = $rest->get($url, ['date' => $_REQUEST['date']]);
            else $data = $rest->get($url);

            return json_decode($data, true);
        }

        public function getOrdersData() {
            $rest = new REST();
            $url = "/get-orders-data";

            if( isset($_REQUEST['date']) ) $data = $rest->get($url, ['date' => $_REQUEST['date']]);
            else $data = $rest->get($url);

            return json_decode($data, true);
        }

        public function makeOrder() {
            $rest = new REST();
            $url = "/make-order";

            $data = $rest->get($url);

            return json_decode($data, true);
        }

        public function transformDateToDay($date) {

            $week = [
                1 => 'lunes',
                2 => 'martes',
                3 => 'miercoles',
                4 => 'jueves',
                5 => 'viernes',
            ];

            $day_number_of_week = date("N", strtotime($date));
            
            $day = $week[$day_number_of_week];

            return $day;
        }

        public function generateImage() {
            if( empty($_FILES) ) return false;
            if( !isset($_FILES['image']) ) return false;

            $uploaded_file = $_FILES['image']['tmp_name'];
            $image_name = $_FILES['image']['name'];
            $cf = new \CURLFile($uploaded_file, mime_content_type($uploaded_file), $image_name);

            return $cf;
        }

        public function isImage($mime_type) {

            $array = ['image/png', 'image/jpeg', 'image/webp'];

            if( in_array($mime_type, $array) ) return true;
            else return false;
        }

        public function getSettings() {
            $rest = new REST();
            $url = "/settings";

            $data = $rest->get($url);
            return json_decode($data, true);
        }

        public function updateSettings($settings) {
            $rest = new REST();
            $url = "/update-settings";

            $data = $rest->put($url, $settings);
            return json_decode($data, true);
        }



        //---------------

        private function userHasGroup($user_id) {
            $rest = new REST();
            $url = "/user-has-group";

            $res = json_decode( $rest->get($url, ['user_id' => $user_id]), true);

            if( $res['status'] == "1" ) return true;
            else return false;

        }




    }

