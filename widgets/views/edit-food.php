<?php

    use App\core\Config;

?>

<form class="edit-food-form" method="POST" enctype="multipart/form-data">
<!-- <form action="/test" class="edit-food-form"> -->

    <input type="hidden" name="id" value="<?= $data['id'] ?>">
    <input type="hidden" name="is_temporal" value="<?= $data['is_temporal'] ?>">
    <input type="hidden" name="submit-edit" value="Editar">

    <div class="img-container">
        <img class="mb-3" src="<?= Config::getBaseUrl() ?><?= $data['food_image'] ?>" alt="">
    </div>

    <div class="form-group label-floating">
        <label class="control-label">Comida</label>
        <input class="form-control" type="text" name="food" value="<?= $data['food'] ?>">
    </div>
    <div class="form-group label-floating">
        <label class="control-label">Nombre corto (opcional)</label>
        <input class="form-control" type="text" name="short_name" value="<?= $data['short_name'] ?>">
    </div>
    <div class="form-group">
        <label class="control-label">Cambia la imagen (opcional)</label>
        <div>
            <input type="text" readonly="" class="form-control" placeholder="Browse...">
            <input type="file" name="image">
        </div>
    </div>
    <p class="text-center">
        <button class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Editar</button>
    </p>
</form>
