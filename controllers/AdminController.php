<?php

    namespace App\controllers;

    use App\core\base\Controller;
    use App\core\http\REST;
    use App\core\Application;


    class AdminController extends Controller {


        public function actionInserttodaysfood() {

            if(isset($_REQUEST['food_id'])) {

                $url = "/insert-food-of-the-day";

                $rest = new REST();

                $rest->post($url, ['food_id' => $_REQUEST['food_id']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['delete_id'])) {

                $url = "/delete-food-from-menu";

                $rest = new REST();

                $rest->delete($url, ['delete_id' => $_REQUEST['delete_id']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['make_permanent'])) {

                $url = "/make-food-permanent";

                $rest = new REST();

                $rest->put($url, ['make_permanent' => $_REQUEST['make_permanent']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['delete_food'])) {

                $url = "/delete-food";

                $rest = new REST();

                $rest->delete($url, ['delete_food' => $_REQUEST['delete_food']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['food'])) {

                $food_name = $_REQUEST['food'];

                $food = [];

                if(isset($_REQUEST['short_name'])) {
                    $short_name = $_REQUEST['short_name'];
                }
                else {
                    $short_name = null;
                }
    
                if( isset($_FILES['image']) ) {

                    $mime_type = $_FILES['image']['type'];

                    if( Application::$app->GlobalFunctions->isImage($mime_type) ) {
                        $image = Application::$app->GlobalFunctions->generateImage();
                        $food['image'] = $image;
                    }
                }
    
                if(isset($_REQUEST['save'])) {
                    $is_temporal = 0;
                }
                else {
                    $is_temporal = "DEFAULT";
                }
                
                $url = "/insert-food";

                $food['food'] = $food_name;
                $food['short_name'] = $short_name;
                $food['is_temporal'] = $is_temporal;

                $rest = new REST();

                $rest->post($url, $food);

                header("Location: /insert-food-of-the-day");
            }
            else {

                $url = "/get-foods";
                $rest = new REST();
                $response = $rest->get($url);

                $foods = json_decode($response, true);


                $url = "/menu";
                $rest = new REST();
                $response = $rest->get($url);

                $menu = json_decode($response, true);


                return $this->render('insert-food', ['foods' => $foods, 'menu' => $menu]);
            }

            

            return $this->render('insert-food');
        }

        public function actionEditfood() {
            
            if(!isset($_REQUEST['id'])) {
                header('Location: insert-food-of-the-day');
            }

            $food = [
                'id' => $_REQUEST['id'],
                'food_image' => $_REQUEST['food_image'],
                'short_name' => $_REQUEST['short_name'],
                'is_temporal' => $_REQUEST['is_temporal'],
                'food' => $_REQUEST['food'],
            ];
            
            if(isset($_REQUEST['submit-edit'])) {

                if( isset($_FILES['image']) ) {

                    $mime_type = $_FILES['image']['type'];

                    if( Application::$app->GlobalFunctions->isImage($mime_type) ) {
                        $image = Application::$app->GlobalFunctions->generateImage();
                        $food['image'] = $image;
                    }
                }


                $url = "/edit-food";
                $rest = new REST();
                $rest->post($url, $food);
                header('Location: insert-food-of-the-day');
            }
            else {
                return $this->render('edit-food', ['food' => $food]);
            }

        }

        public function actionInsertextras() {

            if(isset($_REQUEST['save_food'])) {
                $url = "/insert-extra";

                $extra = [
                    'extra' => $_REQUEST['extra'],
                    'price' => $_REQUEST['price']
                ];

                $rest = new REST();

                $rest->post($url, $extra);
                header("Location: /insert-extras");
            }

            if(isset($_REQUEST['delete'])) {
                $url = "/delete-extra";
                $rest = new REST();
                $extras = $rest->delete($url, ['id' => $_REQUEST['id']]);
                header("Location: /insert-extras");
            }

            $url = "/get-extras";

            $rest = new REST();

            $extras = $rest->get($url);

            $extras = json_decode($extras, true);

            return $this->render("insert-extras", ['extras' => $extras]);
        }

        public function actionEditextra() {

            if(isset($_REQUEST['submit_edit'])) {
                $url = "/edit-extra";

                $extra = [
                    'id' => $_REQUEST['id'],
                    'extra' => $_REQUEST['extra'],
                    'price' => $_REQUEST['price']
                ];

                $rest = new REST();

                $rest->put($url, $extra);
                header("Location: /insert-extras");
            }

            $extra = [
                'id' => $_REQUEST['id'],
                'extra' => $_REQUEST['extra'],
                'price' => $_REQUEST['price']
            ];

            return $this->render('edit-extra', $extra);

            

        }

        public function actionGroups() {

            $tab = 0;
            $user_selected = 0;
            $group_selected = 0;

            if(isset($_REQUEST['add_user_group'])) {
                Application::$app->GlobalFunctions->addUserGroup($_REQUEST['user_id'], $_REQUEST['group_id']);
                $user_selected = $_REQUEST['user_id'];
                $group_selected = $_REQUEST['group_id'];
            }
            else if(isset($_REQUEST['remove_user_from_group'])) {
                Application::$app->GlobalFunctions->removeUserGroup($_REQUEST['user_id']);
                $tab = $_REQUEST['tab'];
            }

            $users = Application::$app->GlobalFunctions->getUsers();
            $groups = Application::$app->GlobalFunctions->getGroups();
            $groups_tables_data = Application::$app->GlobalFunctions->getGroupsTablesData();


            $data = [
                'users' => $users,
                'groups' => $groups,
                'groups_tables_data' => $groups_tables_data,
                'tab' => $tab,
                'user_selected' => $user_selected,
                'group_selected' => $group_selected,
            ];

            return $this->render("groups", $data);
        }

        public function actionPayments() {

            $orders = Application::$app->GlobalFunctions->getWeekOrders();
            $users_array = Application::$app->GlobalFunctions->getUsers();
            $orders_data = Application::$app->GlobalFunctions->getOrdersData();

            $users = [];
            foreach($users_array as $key => $user) {
                if( !isset($users[$user['username']]) ) {
                    $users[$user['username']] = 0;
                }
            }


            $days_of_week = [
                'lunes' => 0,
                'martes' => 0,
                'miercoles' => 0,
                'jueves' => 0,
                'viernes' => 0,
            ];

            // Asignando al arreglo prices_by_user, todos los usuarios, y que cada usuario contenga los días de la semana de lunes a viernes
            foreach($users as $user => $value) {
                $prices_by_user[$user] = $days_of_week;
            }

            foreach($prices_by_user as $user => $days) {
                foreach($days as $day => $user_total) {
                    if( isset($orders[$day][$user]) ) {

                        foreach( $orders[$day][$user] as $key => $tmp ) {
                            $prices_by_user[$user][$day] += $tmp['price'];
                        }
                        
                    }
                }
            }


            $users = $prices_by_user;

            
            $total_by_user = [];
            foreach($users as $user => $days) {
                $total_by_user[$user] = 0;
                foreach($days as $day => $price) {
                    $total_by_user[$user] += $price;
                }
            }

            $users_total_price = 0;
            foreach($total_by_user as $user => $total) {
                $users_total_price += $total;
            }

            
            return $this->render('payments', [
                'users' => $users, 
                'total_by_user' => $total_by_user, 
                'orders_data' => $orders_data,
            ]);
        }

        public function actionSettings() {



            if( isset($_REQUEST['save']) ) {

                $groups_rotate = 0;
                $menu_activated = 0;

                if(isset($_REQUEST['groups_rotate'])) {
                    $groups_rotate = 1;
                }
                if(isset($_REQUEST['menu_activated'])) {
                    $menu_activated = 1;
                }

                $settings = [
                    'save' => 1,
                    'groups_rotate' => $groups_rotate,
                    'menu_activated' => $menu_activated,
                ];

                Application::$app->GlobalFunctions->updateSettings($settings);
            }

            $settings = Application::$app->GlobalFunctions->getSettings();

            return $this->render('settings', ['settings' => $settings]);
        }


    }


?>