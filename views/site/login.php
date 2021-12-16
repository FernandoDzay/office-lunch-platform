

<form action="/login-user" method="post" autocomplete="off" class="full-box logInForm">
    <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
    <p class="text-center text-muted text-uppercase">Inicia sesión con tu cuenta</p>
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
        <input type="submit" value="Iniciar sesión" class="btn btn-raised btn-danger">
    </div>
</form>


 
<?php if( isset($register_success) ): ?>
    <script>
        swal(
            'Tu Cuenta ha sido creada!',
            'Ya puedes loguear',
            'success'
        );
    </script>
<?php elseif( isset($login_error) ): ?>
    <script>
        swal(
            'Username o Contraseña incorrecta!',
            'Intenta de nuevo',
            'error'
        );
    </script>
<?php endif; ?>
