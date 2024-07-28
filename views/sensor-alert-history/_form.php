<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlertHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-alert-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sensor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'channel_number')->textInput() ?>

    <?= $form->field($model, 'first_appereance_time')->textInput() ?>

    <?= $form->field($model, 'first_appereance_value')->textInput() ?>

    <?= $form->field($model, 'last_appreance_time')->textInput() ?>

    <?= $form->field($model, 'last_appreance_value')->textInput() ?>

    <?= $form->field($model, 'is_case_open')->textInput() ?>

    <?= $form->field($model, 'alert_message')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
