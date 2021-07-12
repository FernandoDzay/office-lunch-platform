<?php

    namespace App\widgets;

    use App\core\base\Widget;

    class FooterWidget extends Widget {


        public $data = [];

        public function run() {

            $this->render('footer', ['data' => $this->data]);
        }


    }
?>