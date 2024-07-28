<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorAlertHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-alert-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sensor_alert_history') ?>

    <?= $form->field($model, 'id_sensor') ?>

    <?= $form->field($model, 'channel') ?>

    <?= $form->field($model, 'channel_number') ?>

    <?= $form->field($model, 'first_appereance_time') ?>

    <?php // echo $form->field($model, 'first_appereance_value') ?>

    <?php // echo $form->field($model, 'last_appreance_time') ?>

    <?php // echo $form->field($model, 'last_appreance_value') ?>

    <?php // echo $form->field($model, 'is_case_open') ?>

    <?php // echo $form->field($model, 'alert_message') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
