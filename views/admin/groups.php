<div class="container-fluid">
    <div class="page-header">
        <h1 class="text-titles">Grupos</h1>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                <li class="<?= $tab == 0 ? "active" : "" ?>"><a href="#asignar_grupo" data-toggle="tab">Asignar grupo<?= $tab == 0 ? "<div class='ripple-container'></div>" : "" ?></a></li>
                <?php foreach($groups_tables_data['groups'] as $i => $group): ?>
                    <li class="<?= $tab == $group['group_id'] ? "active" : "" ?>"><a href="#grupo_<?= $group['group_id'] ?>" data-toggle="tab">Grupo <?= $group['group_id'] ?><?= $tab == $group['group_id'] ? "<div class='ripple-container'></div>" : "" ?></a></li>
                <?php endforeach; ?>
                <?php if(!empty($groups_tables_data['users_without_group_table'])): ?>
                    <li><a href="#not_asigned" data-toggle="tab">Sin asignar</a></li>
                <?php endif; ?>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade <?= $tab == 0 ? "active in" : "" ?>" id="asignar_grupo">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-md-10 col-md-offset-1">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="control-label">Usuarios</label>
                                        <select class="form-control" name="user_id">
                                            <?php foreach($users as $key => $user): ?>
                                                <option <?= $user_selected == $user['id'] ? "selected" : "" ?> value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label">Grupo</label>
                                        <select class="form-control" name="group_id">
                                            <?php foreach($groups as $key => $group): ?>
                                                <option <?= $group_selected == $group['id'] ? "selected" : "" ?> value="<?= $group['id'] ?>"><?= $group['id'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <p class="text-center">
                                        <button name="add_user_group" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php foreach($groups_tables_data['groups'] as $i => $group): ?>
                    <div class="tab-pane fade <?= $tab == $group['group_id'] ? "active in" : "" ?>" id="grupo_<?= $group['group_id'] ?>">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Grupo <?= $group['group_id'] ?></th>
                                        <th>Remover del grupo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($groups_tables_data['users_groups_tables'] as $j => $users_groups_table): ?>
                                        <?php if($users_groups_table['group_id'] == $group['group_id']): ?>
                                            <tr>
                                                <td><?= $users_groups_table['username'] ?></td>
                                                <td>
                                                    <form method="POST">
                                                        <input type="hidden" name="tab" value="<?= $group['group_id'] ?>">
                                                        <input type="hidden" name="user_id" value="<?= $users_groups_table['user_id'] ?>">
                                                        <button name="remove_user_from_group" class="btn btn-danger btn-raised btn-xs"><i class="zmdi zmdi-delete"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if(!empty($groups_tables_data['users_without_group_table'])): ?>
                    <div class="tab-pane fade" id="not_asigned">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Usuarios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($groups_tables_data['users_without_group_table'] as $i => $user_without_group_table): ?>
                                        <tr>
                                            <td><?= $user_without_group_table['username'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
