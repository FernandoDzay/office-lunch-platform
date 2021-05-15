<div id="<?= $data['id'] ?>" class="card card-body">
    <img class="mb-3" src="http://local.api-office-lunch<?= $data['food_image'] ?>" alt="">
    <p class="mb-3"><?= $data['food'] ?></p>
    <form method="POST">
        <input type="hidden" name="food_id" value="<?= $data['id'] ?>">
        <button class="btn btn-primary mb-3"><?= $data['btn_text'] ?></button>
    </form>
    <?php if(isset($data['delete_btn'])): ?>
        <a href="/insert-food-of-the-day?delete_id=<?= $data['id'] ?>"><button class="btn btn-danger mb-3">Quitar del menú</button></a>
    <?php endif; ?>
    <?php if(isset($data['delete_food'])): ?>
        <a href="/insert-food-of-the-day?delete_food=<?= $data['id'] ?>"><button class="btn btn-danger mb-3">Borrar comida</button></a>
    <?php endif; ?>
    <?php if(isset($data['make_permanent']) && $data['is_temporal'] === "1"): ?>
        <a href="/insert-food-of-the-day?make_permanent=<?= $data['id'] ?>"><button class="btn btn-success mb-3">Guardar como permanente</button></a>
    <?php endif; ?>
    <?php if(isset($data['edit_btn'])): ?>
        <form action="/edit-food" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <input type="hidden" name="food_image" value="<?= $data['food_image'] ?>">
            <input type="hidden" name="short_name" value="<?= $data['short_name'] ?>">
            <input type="hidden" name="food" value="<?= $data['food'] ?>">
            <input type="hidden" name="is_temporal" value="<?= $data['is_temporal'] ?>">

            <input type="submit" class="btn btn-warning" value="Editar">
        </form>
    <?php endif; ?>
</div>