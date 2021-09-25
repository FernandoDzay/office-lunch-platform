<script src="./js/process.min.js" defer></script>
<script src="./js/calentim.min.js" defer></script>
<script src="./js/table2excel.js"></script>
<link rel="stylesheet" href="./css/calendar.min.css">

<script>
    include_datepicker = 1;
</script>

<div class="container-fluid" style="margin-bottom:-30px;display:flex;justify-content:flex-end;">
    <button id="export_btn" class="btn btn-success btn-raised btn-sm settings-btn"><i class="zmdi zmdi-floppy"></i>Generar Excel</button>
</div>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Tablas de pagos <small><?= isset($_REQUEST['date']) ? "de fecha: " . $_REQUEST['date'] : "de esta semana" ?></small></h1>
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
        <div class="col-xs-12 col-sm-4" style="opacity:0;pointer-events:none;position:absolute;">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Tabla a exportar</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="week">
                    <div class="table-responsive">
                        <table class="table table-hover excel_table">
                            <caption>prueba</caption>
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Total a pagar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($total_by_user as $user => $user_payment): ?>
                                    <?php if($user_payment != 0): ?>
                                        <tr>
                                            <td><?= $user ?></td>
                                            <td><?= $user_payment ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <tr>
                                    <th align="right"><strong>Total:</strong></th>
                                    <th><strong><?= $orders_data['users_total_to_pay'] ?></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-lg-2 col-sm-4" style="float:right;">
            <form method="post">
                <p class="lead" style="margin-bottom:0;margin-top:15px;">Elige una fecha</p>
                <div class="form-group" style="margin-top:0;">
                    <label class="control-label">Puede ser cualquier día de la semana</label>
                    <input id="my_datepicker" class="form-control" type="text" name="date" readonly>
                </div>
                <button class="btn btn-info btn-raised btn-sm settings-btn"><i class="zmdi zmdi-floppy"></i>Elegir fecha</button>
            </form>
        </div>
    </div>
</div>



<script>

    var export_btn = document.getElementById("export_btn");

    export_btn.addEventListener("click", function() {
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll(".excel_table"));
    });

</script>