<?php

    namespace App\widgets;

    use App\core\base\Widget;

    class HeaderWidget extends Widget {


        public $data = [];

        public function run() {

            $this->render('header', ['data' => $this->data]);
        }


    }
?>