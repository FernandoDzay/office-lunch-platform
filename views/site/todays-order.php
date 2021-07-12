<?php if(!empty($orders)): ?>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Mis órdenes</h1>
    </div>
</div>

<div class="full-box" style="padding: 30px 10px;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <li><a href="#listYear" data-toggle="tab"><i class="zmdi zmdi-calendar-note"></i> Extras</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active in fade" id="listYear">
                        <div class="table-responsive">
                            <table class="table table-hover">
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
                                                    <form method="POST">
                                                        <input type="hidden" name="order_id" value="<?= $order['order_id'] ?>">
                                                        <button name="delete_order" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php else: ?>

    <div class="container-fluid">
        <div class="page-header">
            <h1 class="text-titles">Aun no has elegido ninguna orden. <small>Elige ya!!</small></h1>
        </div>
    </div>

<?php endif; ?>

