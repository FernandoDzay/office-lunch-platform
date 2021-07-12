<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Pagos</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#week" data-toggle="tab">Pagos</a></li>
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
                                <?php foreach($prices_by_user as $day => $users): ?>
                                    <tr>
                                        <?php foreach($users as $user => $price): ?>
                                            <td><?= $user ?></td>
                                            <td><?= $day_data['quantity'] ?></td>
                                            <td><?= $day_data['price'] ?></td>
                                        <?php endforeach; ?>
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