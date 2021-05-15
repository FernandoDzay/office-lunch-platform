<?php

    use App\widgets\EditFoodWidget;

?>


<div class="row justify-content-center">
    <div class="col-4">
        <?php
            EditFoodWidget::begin(['data' => $food]);
        ?>
    </div>
</div>