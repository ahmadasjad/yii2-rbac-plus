<?php

return $menuItems = [
    ['label' => 'Role', 'url' => ['/rbac/role'], 'active' => $this->context->route == 'rbac/role/index',],
    ['label' => 'Permission', 'url' => ['/rbac/permission'], 'active' => ($this->context->route == 'rbac/permission/index'),],
    ['label' => 'Rule', 'url' => ['/rbac/rule'], 'active' => ($this->context->route == 'rbac/rule/index'),],
    ['label' => 'User Assignment', 'url' => ['/rbac/assignment'], 'active' => ($this->context->route == 'rbac/assignment/index'),],
];
