<h1>Editar Extra</h1>

<div class="row justify-content-center gy-4">

    <div class="col-5 pd-5">
        <form method="POST">
            <div class="card card-body">

                <label class="form-label" for="extra">Extra</label>
                <input class="mb-3 form-control" type="text" name="extra" value="<?= $extra ?>">

                <label class="form-label" for="price">Precio</label>
                <input class="mb-3 form-control" type="text" name="price" value="<?= $price ?>">

                <input type="hidden" name="id" value="<?= $id ?>">

                <input type="submit" name="submit_edit" class="btn-primary btn-lg" value="Editar extra">

            </div>
        </form>
    </div>

</div>