<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedToItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-received-to-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_asset_received')->textInput() ?>

    <?= $form->field($model, 'id_asset_item')->textInput() ?>

    <?= $form->field($model, 'created_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
