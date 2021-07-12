<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Mis comidas de la semana</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Comidas de la semana</a></li>
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
                                                <td><?= $day ?></td>
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
    </div>
</div>