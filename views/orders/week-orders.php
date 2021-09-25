<script src="./js/process.min.js" defer></script>
<script src="./js/calentim.min.js" defer></script>
<link rel="stylesheet" href="./css/calendar.min.css">

<script>
    include_datepicker = 1;
</script>


<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Comidas de la semana <small><?= isset($_REQUEST['date']) ? "de fecha: " . $_REQUEST['date'] : "" ?></small></h1>
    </div>
</div>

<form method="post">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                    <?php foreach($orders as $day => $users): ?>
                        <li class="<?= $day == "lunes" ? "active" : "" ?>"><a href="#<?= $day ?>" data-toggle="tab"><?= ucwords($day) ?><div class="ripple-container"></div></a></li>
                    <?php endforeach; ?>
                </ul>
                <div id="myTabContent" class="tab-content">
    
                    <?php foreach($orders as $day => $users): ?>
                        <div class="tab-pane fade<?= $day == "lunes" ? " active in" : "" ?>" id="<?= $day ?>">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Usuario</th>
                                            <th>Comida</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($users as $user => $user_orders): ?>
                                            <?php foreach($user_orders as $i => $order): ?>
                                                <tr>
                                                    <?php if( $i > 0 ): ?>
                                                        <td style="border-top:none;"></td>
                                                        <td style="border-top:none;"><?= $order['order'] ?></td>
                                                        <td style="border-top:none;"><?= $order['quantity'] ?></td>
                                                    <?php else: ?>
                                                        <td><?= $user ?></td>
                                                        <td><?= $order['order'] ?></td>
                                                        <td><?= $order['quantity'] ?></td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
    
                            <div class="row" style="margin-top: 30px;">
                                <div class="col-xs-12 col-sm-4">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#week" data-toggle="tab">Cantidad de comidas del <?= ucwords($day) ?></a></li>
                                    </ul>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Comida</th>
                                                    <th>Cantidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($orders_data['days'][$day]['quantity_data'] as $key => $order): ?>
                                                    <tr>
                                                        <td><?= $order['order'] ?></td>
                                                        <td><?= $order['quantity'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
    
    
                        </div>
                    <?php endforeach; ?>

                    <div class="col-xs-12 col-lg-2 col-sm-4" style="float:right;">
                        <p class="lead" style="margin-bottom:0;margin-top:15px;">Elige una fecha</p>
                        <div class="form-group" style="margin-top:0;">
                            <label class="control-label">Puede ser cualquier día de la semana</label>
                            <input id="my_datepicker" class="form-control" type="text" name="date" readonly>
                        </div>
                        <button class="btn btn-info btn-raised btn-sm settings-btn"><i class="zmdi zmdi-floppy"></i>Elegir fecha</button>
                    </div>
    
    
                </div>
            </div>
        </div>
    </div>
</form>