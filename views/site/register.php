<form action="/register-user" method="post" autocomplete="off" class="full-box logInForm">
    <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
    <p class="text-center text-muted text-uppercase">Regístrate!</p>
    <div class="form-group label-floating">
        <label class="control-label" for="username">Username</label>
        <input class="form-control" name="username" type="text">
        <p class="help-block">Escribe tu username</p>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="UserPass">Password</label>
        <input class="form-control" name="password" type="password">
        <p class="help-block">Escribe tu password</p>
    </div>
    <div class="form-group text-center">
        <input type="submit" value="Crear cuenta" class="btn btn-raised btn-danger">
    </div>
</form>


<?php if( isset($text) ): ?>
    <p class="text-danger bg-white"><?= $text ?></p>
<?php endif; ?>
