<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterFieldConfig */

$this->title = 'Update Asset Master Field Config';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Field Config', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail Asset Master Field Config', 'url' => ['view', 'id' => $model->id_asset_master_field_config]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="asset-master-field-config-update">

<!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
