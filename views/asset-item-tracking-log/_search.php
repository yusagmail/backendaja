<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-tracking-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_asset_item_tracking_log') ?>

    <?= $form->field($model, 'id_asset_item') ?>

    <?= $form->field($model, 'id_device_tracking') ?>

    <?= $form->field($model, 'log_date') ?>

    <?= $form->field($model, 'log_datetime') ?>

    <?php // echo $form->field($model, 'device_logtime') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'full_message') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
