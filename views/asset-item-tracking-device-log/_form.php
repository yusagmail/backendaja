<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDeviceLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-tracking-device-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_asset_item_tracking_device')->textInput() ?>

    <?= $form->field($model, 'id_asset_item')->textInput() ?>

    <?= $form->field($model, 'id_device')->textInput() ?>

    <?= $form->field($model, 'installed_date')->textInput() ?>

    <?= $form->field($model, 'installed_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_active')->textInput() ?>

    <?= $form->field($model, 'notes')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
