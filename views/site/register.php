<form action="/register-user" method="post" autocomplete="off" id="register_form" class="full-box logInForm">
    <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
    <p class="text-center text-muted text-uppercase">Regístrate!</p>
    <div class="form-group label-floating">
        <label class="control-label" for="username">Username</label>
        <input class="form-control" id="username" name="username" type="text">
        <p class="help-block">Escribe tu username</p>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="password">Password</label>
        <input class="form-control" id="password" name="password" type="password">
        <p class="help-block">Escribe tu password</p>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="birth_month">Mes de cumpleaños</label>
        <select class="form-control" name="birth_month" id="birth_month">
            <option value="1">Enero</option>
            <option value="2">Febrero</option>
            <option value="3">Marzo</option>
            <option value="4">Abril</option>
            <option value="5">Mayo</option>
            <option value="6">Junio</option>
            <option value="7">Julio</option>
            <option value="8">Agosto</option>
            <option value="9">Septiembre</option>
            <option value="10">Octubre</option>
            <option value="11">Noviembre</option>
            <option value="12">Diciembre</option>
        </select>
        <p class="help-block">Ingresa el mes de tu cumpleaños</p>
    </div>
    <div class="form-group label-floating">
        <label class="control-label" for="birth_day">Día de cumpleaños</label>
        <select class="form-control" name="birth_day" id="birth_day">
            <?php for($i=1; $i <= 31; $i++): ?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor; ?>
        </select>
        <p class="help-block">Ingresa el día de tu cumpleaños</p>
    </div>
    <div class="form-group text-center">
        <input type="submit" value="Crear cuenta" class="btn btn-raised btn-danger">
    </div>
</form>


<?php if( isset($register_error) ): ?>
    <script>
        swal(
            'Ese Username ya existe',
            'Intenta variar un poco tu Username',
            'error'
        );
    </script>
<?php endif; ?>

