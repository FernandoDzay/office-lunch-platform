<?php

    use App\widgets\FoodWidget;

?>

<h1>Crear comida</h1>

<div class="row justify-content-center gy-4">

    <div class="col-5 pd-5">
        <form action="/insert-food-of-the-day" method="POST">
            <div class="card card-body">

                <label class="form-label" for="image">Ingresa una imagen (opcional)</label>
                <input class="mb-3" type="file" name="image">

                <label class="form-label" for="short_name">Nombre corto (opcional)</label>
                <input class="mb-3 form-control" type="text" name="short_name">

                <label class="form-label" for="food">Comida</label>
                <input class="mb-3 form-control" type="text" name="food">

                <input type="checkbox" name="save">
                <label class="form-label" for="save">Deseas guardar la comida creada?</label>

                <input type="submit" class="btn-primary btn-lg" value="Agregar comida rápida">

            </div>
        </form>
    </div>

</div>


<h1>Agregar comida del día</h1>

<div class="row gy-3">
    <?php
        foreach($foods as $key => $food) {
            $food['btn_text'] = 'Agregar al menú';
            $food['edit_btn'] = true;
            $food['delete_food'] = true;
            $food['make_permanent'] = true;
            ?> <div class="col-3"> <?php
                FoodWidget::begin(['data' => $food]);
            ?> </div> <?php
        }
    ?>
</div>

<h1>MENU</h1>

<div class="row gy-3">
    <?php
        foreach($menu as $key => $food) {
            $food['btn_text'] = 'Agregar';
            $food['delete_btn'] = true;
            ?> <div class="col-3"> <?php
                FoodWidget::begin(['data' => $food]);
            ?> </div> <?php
        }
    ?>
</div>

