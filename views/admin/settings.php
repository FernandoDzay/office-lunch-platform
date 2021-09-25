<form method="post">
    <div class="container-fluid">
        <div class="page-header">
            <h1 class="text-titles">Configuración</h1>
        </div>
        <p class="lead" style="margin-bottom:50px;">En esta sección puedes activar o desactivar alguna configuración</p>

        <div class="settings-container">
            <p class="lead">Rotar horarios de comida</p>
            <div>
                <div class="onoffswitch">
                    <input type="checkbox" name="groups_rotate" class="onoffswitch-checkbox" id="groups_rotate" tabindex="0" <?= $settings['groups_rotate']['int_value'] == 1 ? "checked" : "" ?>>
                    <label class="onoffswitch-label" for="groups_rotate">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>

        <div class="settings-container">
            <p class="lead">Menu</p>
            <div>
                <div class="onoffswitch">
                    <input type="checkbox" name="menu_activated" class="onoffswitch-checkbox" id="menu_activated" tabindex="0" <?= $settings['menu_activated']['int_value'] == 1 ? "checked" : "" ?>>
                    <label class="onoffswitch-label" for="menu_activated">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        </div>

        <input type="hidden" name="save" value="1">
        <button class="btn btn-info btn-raised btn-sm settings-btn"><i class="zmdi zmdi-floppy"></i>Guardar</button>
    </div>
</form>