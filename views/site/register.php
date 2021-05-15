<div class="card card-body card-form mb-3">
    <h1>Regístrate!</h1>
    <form action="/register-user" method="POST">

        <label for="username" class="form-label">Username</label>
        <input type="text" name="username" class="form-control mb-3">

        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control mb-3">

        <input type="submit" class="btn btn-primary btn-lg">

    </form>
</div>

<?php if( isset($text) ): ?>
    <p class="text-danger bg-white"><?= $text ?></p>
<?php endif; ?>

