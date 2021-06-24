<h1>Asignar grupo</h1>


<form method="POST">
    <div class="row">

        <div class="col-4">
            <label for="user">Usuarios</label>
            <select name="user_id">
                <?php foreach($users as $key => $user): ?>
                    <option value="<?= $user['id'] ?>"><?= $user['username'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-4">
            <label for="group">Grupo</label>
            <select name="group_id">
                <?php foreach($groups as $key => $group): ?>
                    <option value="<?= $group['id'] ?>"><?= $group['id'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div class="col-4">
            <input class="btn btn-primary" type="submit" name="add_user_group" value="Añadir al grupo">
        </div>

    </div>

</form>
<br>
<br>
<br>

<h1>Grupos</h1><br>


<?php foreach($groups_tables_data['groups'] as $i => $group): ?>
    <h2>Grupo <?= $group['group_id'] ?></h2>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th>usuarios</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($groups_tables_data['users_groups_tables'] as $j => $users_groups_table): ?>
                <?php if($users_groups_table['group_id'] == $group['group_id']): ?>
                    <tr>
                        <td><?= $users_groups_table['username'] ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br>
<?php endforeach; ?>



<br>
<br>
<br>

<h1>Usuarios sin grupos asignados</h1>

<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>usuarios</th>
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