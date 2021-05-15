
<form>
    <div class="card card-body">

        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <input type="hidden" name="is_temporal" value="<?= $data['is_temporal'] ?>">

        <img class="mb-3" src="http://local.api-office-lunch<?= $data['food_image'] ?>" alt="">
        <input class="mb-3" type="file" name="food_image" value="<?= $data['food_image'] ?>">

        <label class="form-label" for="short_name">Nombre corto (opcional)</label>
        <input class="mb-3 form-control" type="text" name="short_name" value="<?= $data['short_name'] ?>">

        <label class="form-label" for="food">Comida</label>
        <input class="mb-3 form-control" type="text" name="food" value="<?= $data['food'] ?>">

        <input type="submit" class="btn-warning btn-lg" name="submit-edit" value="Editar">

    </div>
</form>
