<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Crear Extra</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#new" data-toggle="tab">Crear extra</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form method="post">
                                    <input type="hidden" name="save_food">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Extra</label>
                                        <input class="form-control" name="extra" type="text">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Precio</label>
                                        <input class="form-control" name="price" type="text">
                                    </div>
                                    <p class="text-center">
                                        <button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Extras</h1>
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
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="text-center">Extra</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Editar</th>
                                        <th class="text-center">Borrar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($extras)): ?>
                                        <?php foreach($extras as $key => $extra): ?>
                                            <tr>
                                                <td><?= $extra['extra'] ?></td>
                                                <td><?= $extra['price'] ?></td>
                                                <td>
                                                    <form action="/edit-extra" method="POST">
                                                        <input type="hidden" name="id" value="<?= $extra['id'] ?>">
                                                        <input type="hidden" name="extra" value="<?= $extra['extra'] ?>">
                                                        <input type="hidden" name="price" value="<?= $extra['price'] ?>">
                                                        <button name="edit" class="btn btn-warning btn-raised btn-xs"><i class="zmdi zmdi-edit"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form method="POST">
                                                        <input type="hidden" name="id" value="<?= $extra['id'] ?>">
                                                        <button name="delete" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
