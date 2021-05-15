<?php

    namespace App\controllers;

    use App\core\base\Controller;
    use App\core\http\REST;


    class AdminController extends Controller {


        public function actionInserttodaysfood() {

            if(isset($_REQUEST['food_id'])) {

                $url = "http://local.api-office-lunch/insert-food-of-the-day";

                $rest = new REST();

                $rest->post($url, ['food_id' => $_REQUEST['food_id']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['delete_id'])) {

                $url = "http://local.api-office-lunch/delete-food-from-menu";

                $rest = new REST();

                $rest->delete($url, ['delete_id' => $_REQUEST['delete_id']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['make_permanent'])) {

                $url = "http://local.api-office-lunch/make-food-permanent";

                $rest = new REST();

                $rest->put($url, ['make_permanent' => $_REQUEST['make_permanent']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['delete_food'])) {

                $url = "http://local.api-office-lunch/delete-food";

                $rest = new REST();

                $rest->delete($url, ['delete_food' => $_REQUEST['delete_food']]);

                header("Location: /insert-food-of-the-day");
            }
            elseif(isset($_REQUEST['food'])) {

                $food = $_REQUEST['food'];

                if(isset($_REQUEST['short_name'])) {
                    $short_name = $_REQUEST['short_name'];
                }
                else {
                    $short_name = null;
                }
    
                if(isset($_REQUEST['food_image'])) {
                    $food_image = $_REQUEST['food_image'];
                }
                else {
                    $food_image = "DEFAULT";
                }
    
                if(isset($_REQUEST['save'])) {
                    $is_temporal = 0;
                }
                else {
                    $is_temporal = "DEFAULT";
                }
                
                $url = "http://local.api-office-lunch/insert-food";
                
                $food = [
                    'food' => $food,
                    'short_name' => $short_name,
                    'food_image' => $food_image,
                    'is_temporal' => $is_temporal,
                ];

                $rest = new REST();

                $rest->post($url, $food);

                header("Location: /insert-food-of-the-day");
            }
            else {

                $url = "http://local.api-office-lunch/get-foods";
                $rest = new REST();
                $response = $rest->get($url);

                $foods = json_decode($response, true);


                $url = "http://local.api-office-lunch/menu";
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
                $url = "http://local.api-office-lunch/edit-food";

                $rest = new REST();

                $rest->put($url, $food);
                header('Location: insert-food-of-the-day');
            }
            else {
                return $this->render('edit-food', ['food' => $food]);
            }

        }


    }


?>