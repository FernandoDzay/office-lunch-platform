<h1>Crear Extra</h1>

<div class="row justify-content-center gy-4">

    <div class="col-5 pd-5">
        <form method="POST">
            <div class="card card-body">

                <label class="form-label" for="extra">Extra</label>
                <input class="mb-3 form-control" type="text" name="extra">

                <label class="form-label" for="price">Precio</label>
                <input class="mb-3 form-control" type="text" name="price">

                <input type="submit" name="save_food" class="btn-primary btn-lg" value="Guardar extra">

            </div>
        </form>
    </div>

</div>

<h1>Extras</h1>

<table class="table table-dark table-striped">
  <thead>
    <tr>
        <th>Extra</th>
        <th>Precio</th>
        <th>Opciones</th>
    </tr>
  </thead>
  <tbody>

    <?php if(!empty($extras)): ?>
        <?php foreach($extras as $key => $extra): ?>
            <tr>
                <td><?= $extra['extra'] ?></td>
                <td><?= $extra['price'] ?></td>
                <td>
                    <div class="row">
                        <div class="col-2">
                            <form method="POST">
                                <input type="hidden" name="id" value="<?= $extra['id'] ?>">
                                <button name="delete" class="btn btn-danger">Borrar</button>
                            </form>
                        </div>
                        <div class="col-2">
                            <form action="/edit-extra" method="POST">
                                <input type="hidden" name="id" value="<?= $extra['id'] ?>">
                                <input type="hidden" name="extra" value="<?= $extra['extra'] ?>">
                                <input type="hidden" name="price" value="<?= $extra['price'] ?>">
                                <button name="edit" class="btn btn-warning">Editar</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>

  </tbody>
</table>