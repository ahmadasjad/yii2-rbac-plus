<?php

use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use yii\bootstrap\Nav;

/* @var $this yii\web\View */
/* @var $searchModel ahmadasjad\rbacplus\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('rbac', 'Roles Manager');
$this->params['breadcrumbs'][] = $this->title;

CrudAsset::register($this);
?>
<div id="second-menu" class="clearfix col-sm-3">
    <?php
    $menuItems = [
        ['label' => 'Role', 'url' => ['/rbac/role']],
        ['label' => 'Permission', 'url' => ['/rbac/permission']],
        ['label' => 'Rule', 'url' => ['/rbac/rule']],
        ['label' => 'Assignment', 'url' => ['/rbac/assignment']],
    ];
    echo Nav::widget([
        'items' => $menuItems,
    ]);
    ?>
</div>
<div class="auth-item-index col-sm-9">
    <div id="ajaxCrudDatatable">
        <?=
        GridView::widget([
            'id' => 'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'columns' => require(__DIR__ . '/_columns.php'),
            'toggleDataOptions' => [
                'all' => [
                    'icon' => 'resize-full',
                    'class' => 'btn btn-default',
                    'label' => Yii::t('rbac', 'All'),
                    'title' => Yii::t('rbac', 'Show all data')
                ],
                'page' => [
                    'icon' => 'resize-small',
                    'class' => 'btn btn-default',
                    'label' => Yii::t('rbac', 'Page'),
                    'title' => Yii::t('rbac', 'Show first page data')
                ],
            ],
            'toolbar' => [
                ['content' =>
                    Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['role' => 'modal-remote', 'title' => Yii::t('rbac', 'Create new rule'), 'class' => 'btn btn-default']) .
                    Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''], ['data-pjax' => 1, 'class' => 'btn btn-default', 'title' => Yii::t('rbac', 'Reload Grid')]) .
                    '{toggleData}' .
                    '{export}'
                ],
            ],
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
                'type' => 'primary',
                'heading' => '<i class="glyphicon glyphicon-list"></i> ' . $this->title,
                'before' => '<em>' . Yii::t('rbac', '* Resize table columns just like a spreadsheet by dragging the column edges.') . '</em>',
                'after' => false,
            ]
        ])
        ?>
    </div>
</div>
<?php
Modal::begin([
    "id" => "ajaxCrubModal",
    "footer" => "", // always need it for jquery plugin
])
?>
<?php Modal::end(); ?>
