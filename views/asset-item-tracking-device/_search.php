<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDeviceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-tracking-device-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_asset_item_tracking_device') ?>

    <?= $form->field($model, 'id_asset_master') ?>

    <?= $form->field($model, 'id_device') ?>

    <?= $form->field($model, 'installed_date') ?>

    <?= $form->field($model, 'installed_by') ?>

    <?php // echo $form->field($model, 'status_active') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
