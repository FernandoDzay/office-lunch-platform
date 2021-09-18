<?php
    
    use App\core\Config;

    if(isset($data['delete_btn']) || isset($data['delete_food']) || isset($data['make_permanent']) || isset($data['edit_btn']) ) {
        $extra_padding = " extra-padding";
    }
    else {
        $extra_padding = "";
    }
?>


<!-- <div id="" class="card card-body"> -->
<div id="<?= $data['id'] ?>" class="food-card<?= $extra_padding ?>">
    <div class="content">
        <img class="mb-3" src="<?= Config::getBaseUrl() ?><?= $data['food_image'] ?>" alt="">
        <p class="title"><?= $data['food'] ?></p>

        <?php if(isset($data['delete_btn'])): ?>
            <form action="/insert-food-of-the-day">
                <input type="hidden" name="delete_id" value="<?= $data['id'] ?>">
                <button type="submit" class="submit-button delete">
                    <span>Quitar del menú</span>
                    <div class="success">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve"><path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z"/></svg>
                    </div>
                </button>
            </form>
        <?php else: ?>
            <form method="POST">
                <input type="hidden" name="food_id" value="<?= $data['id'] ?>">
                <input type="hidden" name="food" value="<?= $data['food'] ?>">
                <input type="hidden" name="add_food" value="">
                <button class="submit-button">
                    <span><?= $data['btn_text'] ?></span>
                    <div class="success">
                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve"><path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z"/></svg>
                    </div>
                </button>
            </form>
        <?php endif; ?>

        <div class="abs-container">


            <?php if(isset($data['make_permanent']) && $data['is_temporal'] === "1"): ?>
                <a href="/insert-food-of-the-day?make_permanent=<?= $data['id'] ?>"><button class="btn btn-success btn-raised btn-xs"><i class="zmdi zmdi-floppy"></i></button></a>
            <?php endif; ?>
            <?php if(isset($data['edit_btn'])): ?>
                <form action="/edit-food" method="POST">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="hidden" name="food_image" value="<?= $data['food_image'] ?>">
                    <input type="hidden" name="short_name" value="<?= $data['short_name'] ?>">
                    <input type="hidden" name="food" value="<?= $data['food'] ?>">
                    <input type="hidden" name="is_temporal" value="<?= $data['is_temporal'] ?>">
        
                    <button class="btn btn-warning btn-raised btn-xs"><i class="zmdi zmdi-edit"></i></button>
                </form>
            <?php endif; ?>
            <?php if(isset($data['delete_food'])): ?>
                <a href="/insert-food-of-the-day?delete_food=<?= $data['id'] ?>"><button class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button></a>
            <?php endif; ?>
        </div>
    </div>
</div>