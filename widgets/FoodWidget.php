<?php

    namespace App\widgets;

    use App\core\base\Widget;

    class FoodWidget extends Widget {

        public $data = [];



        public function run() {

            return $this->render('food', ['data' => $this->data]);
        }


    }


?>