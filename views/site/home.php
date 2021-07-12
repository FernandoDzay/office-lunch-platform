<?php

    use App\widgets\FoodWidget;

?>



<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Menú</h1>
    </div>
</div>

<div class="full-box custom-full-box text-center" style="padding: 30px 10px;">
    <?php
        foreach($menu as $key => $food) {
            $food['btn_text'] = 'Agregar';
            FoodWidget::begin(['data' => $food]);
        }
    ?>
</div>

<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Agrega un extra</h1>
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
                                        <th class="text-center">#</th>
                                        <th class="text-center">Extra</th>
                                        <th class="text-center">Precio</th>
                                        <th class="text-center">Agregar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($extras)): ?>
                                        <?php foreach($extras as $key => $extra): ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= $extra['extra'] ?></td>
                                                <td><?= $extra['price'] ?></td>
                                                <td>
                                                    <form method="POST">
                                                        <input type="hidden" name="extra" value="<?= $extra['extra'] ?>">
                                                        <button name="add_extra" class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-refresh"></i></button>
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
