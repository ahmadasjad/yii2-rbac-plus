<?php

namespace ahmadasjad\rbacplus\models;

use Yii;
use yii\rbac\Item;

/**
 * @author Ahmad Asjad <ahmadcimage@gmail.com>
 * @since 1.0.0
 */
class PermissionSearch extends AuthItemSearch {

    public function __construct($config = array()) {
        parent::__construct($item = null, $config);
    }

    public function attributeLabels() {
        $labels = parent::attributeLabels();
        $labels['name'] = Yii::t('rbac', 'Permission name');
        return $labels;
    }

    protected function getType() {
        return Item::TYPE_PERMISSION;
    }

}
