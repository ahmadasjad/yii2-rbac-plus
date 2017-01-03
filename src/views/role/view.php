<?php

use ahmadasjad\rbacplus\models\Role;

$permissions = Role::getPermistions($model->name);
$roles = Role::getRoles($model->name);
$first_permission = '';
$first_role = '';
$_permission_rows = [];
$_role_rows = [];
foreach ($permissions as $permission) {
    if (empty($first_permission)) {
        $first_permission = $permission->name;
    } else {
        $_permission_rows[] = '<tr><td>' . $permission->name . '</td></tr>';
    }
}
foreach ($roles as $role) {
    if (empty($first_role)) {
        $first_role = $role->name;
    } else {
        $_role_rows[] = '<tr><td>' . $role->name . '</td></tr>';
    }
}
?>
<div class="permistion-item-view">
    <table class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th><?= $model->attributeLabels()['name'] ?></th><td><?= $model->name ?></td></tr>
            <tr><th><?= $model->attributeLabels()['description'] ?></th><td><?= $model->description ?></td></tr>
            <tr><th><?= $model->attributeLabels()['ruleName'] ?></th><td><?= $model->ruleName == null ? '<span class="text-danger">' . Yii::t('rbac', '(not use)') . '</span>' : $model->ruleName ?></td></tr>
            <tr><th rowspan="<?= count($permissions) ?>" ><?= $model->attributeLabels()['permissions'] ?></th><td><?= $first_permission ?></td></tr>
            <?= implode("", $_permission_rows) ?>
            <tr><th rowspan="<?= count($roles) ?>" ><?= $model->attributeLabels()['roles'] ?></th><td><?= $first_role ?></td></tr>
            <?= implode("", $_role_rows) ?>
    </table>
</div>
