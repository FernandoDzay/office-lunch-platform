<?php

    use App\widgets\FoodWidget;

?>


<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Crear comida</h1>
    </div>
    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptas reiciendis tempora voluptatum eius porro ipsa quae voluptates officiis sapiente sunt dolorem, velit quos a qui nobis sed, dignissimos possimus!</p>
</div>


<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="active"><a href="#new" data-toggle="tab">Crear comida</a></li>
                <li><a href="#list" data-toggle="tab">Menú de hoy</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="new">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <!-- <form action="/insert-food-of-the-day" method="POST"> -->
                                <form enctype="multipart/form-data" action="/test" method="POST">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Comida</label>
                                        <input class="form-control" name="food" type="text">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nombre corto (opcional)</label>
                                        <input class="form-control" name="short_name" type="text">
                                    </div>
                                    <div class="form-group label-floating">
                                        <label class="control-label checkbox" name="save">Deseas guardar la comida creada?</label>
                                        <input class="form-control" name="save" type="checkbox">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Ingresa una imagen (opcional)</label>
                                        <div>
                                            <input type="text" readonly="" class="form-control" placeholder="Browse...">
                                            <input type="file" name="image">
                                        </div>
                                    </div>
                                    <p class="text-center">
                                        <button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Save</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="list">
                    <div class="table-responsive">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Comida</th>
                                    <th class="text-center">Nombre Corto</th>
                                    <th class="text-center">Quitar del menú</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0; foreach($menu as $key => $food): ?>
                                    <tr>
                                        <td><?= $count ?></td>
                                        <td><?= $food['food'] ?></td>
                                        <td><?= $food['short_name'] ?></td>
                                        <td><a href="/insert-food-of-the-day?delete_id=<?= $food['id'] ?>" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></a></td>
                                    </tr>
                                <?php $count++; endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Agregar comida del día</h1>
    </div>
</div>

<div class="full-box custom-full-box text-center" style="padding: 30px 10px;">
    <?php
        foreach($foods as $key => $food) {
            $food['btn_text'] = 'Agregar al menú';
            $food['edit_btn'] = true;
            $food['delete_food'] = true;
            $food['make_permanent'] = true;
            FoodWidget::begin(['data' => $food]);
        }
    ?>
</div>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Menú</h1>
    </div>
</div>

<div class="full-box custom-full-box text-center" style="padding: 30px 10px;">
    <?php
        foreach($menu as $key => $food) {
            $food['btn_text'] = 'Agregar';
            $food['delete_btn'] = true;
            FoodWidget::begin(['data' => $food]);
        }
    ?>
</div>