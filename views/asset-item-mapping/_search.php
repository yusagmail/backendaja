<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMappingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-mapping-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asset_item_mapping') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'id_sensor') ?>

    <?= $form->field($model, 'id_point') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
