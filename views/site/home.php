<?php

    use App\widgets\FoodWidget;
    
    /* date_default_timezone_set('America/Merida');
    echo date('Y-m-d h:i:s'); */

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


<h1>Extras</h1>

<table class="table table-dark table-striped">
  <thead>
    <tr>
        <th>Extra</th>
        <th>Precio</th>
        <th>Opciones</th>
    </tr>
  </thead>
  <tbody>

    <?php if(!empty($extras)): ?>
        <?php foreach($extras as $key => $extra): ?>
            <tr>
                <td><?= $extra['extra'] ?></td>
                <td><?= $extra['price'] ?></td>
                <td>
                    <div class="row">
                        <div class="col-2">
                            <form method="POST">
                                <input type="hidden" name="extra" value="<?= $extra['extra'] ?>">
                                <button name="add_extra" class="btn btn-primary">Agregar</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

  </tbody>
</table>


<?php if(!empty($orders)): ?>

    <h1>Mis órdenes</h1>

    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>Orden</th>
                <th>Cantidad</th>
                <th>Precio total</th>
                <th>Borrar Orden</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach($orders as $key => $order): ?>
                <tr>
                    <td><?= $order['order_'] ?></td>
                    <td><?= $order['quantity'] ?></td>
                    <td><?= $order['price'] ?></td>
                    <td>
                        <div class="row">
                            <div class="col-2">
                                <form method="POST">
                                    <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                    <button name="delete_order" class="btn btn-danger">X</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

<?php endif; ?>



