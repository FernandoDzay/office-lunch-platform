<?php

    namespace App\widgets;

    use App\core\base\Widget;

    class NewHeaderWidget extends Widget {


        public $data = [];

        public function run() {

            $this->render('new-header', ['data' => $this->data]);
        }


    }
?>