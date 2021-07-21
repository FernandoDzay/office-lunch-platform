<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Tablas de pagos</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Pagos de Usuarios</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="week">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Lunes</th>
                                    <th>Martes</th>
                                    <th>Miércoles</th>
                                    <th>Jueves</th>
                                    <th>Viernes</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user => $days): ?>
                                    <tr>
                                        <td><?= $user ?></td>
                                        <?php foreach($days as $day => $price): ?>
                                            <td><?= $price ?></td>
                                        <?php endforeach; ?>
                                        <td><?= $total_by_user[$user] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td align="right" colspan="6"><strong>Total:</strong></td>
                                    <td><strong>$<?= $orders_data['users_total_to_pay'] ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Total a pagar</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="week">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Día</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orders_data['days'] as $day => $day_data): ?>
                                    <tr>
                                        <td><?= $day ?></td>
                                        <td><?= $day_data['total_to_pay'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td align="right"><strong>Total:</strong></td>
                                    <td><strong>$<?= $orders_data['total_to_pay'] ?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>