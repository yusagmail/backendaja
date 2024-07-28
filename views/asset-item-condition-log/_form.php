<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemConditionLog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-condition-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_asset_item')->textInput() ?>

    <?= $form->field($model, 'id_mst_status_condition')->textInput() ?>

    <?= $form->field($model, 'condition_log_date')->textInput() ?>

    <?= $form->field($model, 'condition_log_datetime')->textInput() ?>

    <?= $form->field($model, 'condition_log_notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reported_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reported_user_id')->textInput() ?>

    <?= $form->field($model, 'reported_ip_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo1')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
