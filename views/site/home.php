<?php

    use App\widgets\FoodWidget;

?>


<h1>Agregar comida del día</h1>

<div class="row gy-3">
    <?php
        foreach($menu as $key => $food) {
            $food['btn_text'] = 'Agregar';
            ?> <div class="col-3"> <?php
                FoodWidget::begin(['data' => $food]);
            ?> </div> <?php
        }
    ?>
</div>



