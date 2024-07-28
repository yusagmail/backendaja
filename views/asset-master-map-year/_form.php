<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterMapYear */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-master-map-year-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_asset_master')->textInput() ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'current_count')->textInput() ?>

    <?= $form->field($model, 'total_need')->textInput() ?>

    <?= $form->field($model, 'updated_date')->textInput() ?>

    <?= $form->field($model, 'updated_user')->textInput() ?>

    <?= $form->field($model, 'updated_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
