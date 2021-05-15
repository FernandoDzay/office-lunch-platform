<?php

    namespace App\widgets;

    use App\core\base\Widget;

    class EditFoodWidget extends Widget {

        public $data = [];

        public function run() {

            return $this->render('edit-food', ['data' => $this->data]);
        }


    }


?>