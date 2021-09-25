<script src="./js/process.min.js" defer></script>
<script src="./js/calentim.min.js" defer></script>
<link rel="stylesheet" href="./css/calendar.min.css">

<script>
    include_datepicker = 1;
</script>


<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Mis comidas de la semana <small><?= isset($_REQUEST['date']) ? "de fecha: " . $_REQUEST['date'] : "" ?></small></h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Comidas de la semana <?= isset($_REQUEST['date']) ? "\"" . $_REQUEST['date'] . "\"" : "" ?></a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="week">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Día</th>
                                    <th>Comida</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orders as $day => $values): ?>
                                    <?php foreach($values as $i => $day_data): ?>
                                        <tr>
                                            <?php if($i == 0): ?>
                                                <td><?= ucwords($day) ?></td>
                                            <?php else: ?>
                                                <td></td>
                                            <?php endif; ?>
                                            <td><?= $day_data['order'] ?></td>
                                            <td><?= $day_data['quantity'] ?></td>
                                            <td><?= $day_data['price'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <form method="post">
            <div class="col-xs-12 col-lg-2 col-sm-4" style="float:right;margin-top:30px;">
                <p class="lead" style="margin-bottom:0;margin-top:15px;">Elige una fecha</p>
                <div class="form-group" style="margin-top:0;">
                    <label class="control-label">Puede ser cualquier día de la semana</label>
                    <input id="my_datepicker" class="form-control" type="text" name="date" readonly>
                </div>
                <button class="btn btn-info btn-raised btn-sm settings-btn"><i class="zmdi zmdi-floppy"></i>Elegir fecha</button>
            </div>
        </form>
    </div>
</div>