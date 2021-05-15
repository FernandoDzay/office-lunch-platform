<div class="container">
    <div class="row justify-content-end">
        <div class="col-3">
            <?php if($_SERVER['REQUEST_URI'] === "/login" ): ?>
                <a class="bg-white" href="/register">Registrarme</a>
            <?php else: ?>
                <a class="bg-white" href="/login">Login</a>
            <?php endif; ?>
        </div>
    </div>
</div>