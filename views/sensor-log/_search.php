<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-log-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sensor_log') ?>

    <?= $form->field($model, 'id_sensor') ?>

    <?= $form->field($model, 'log_time') ?>

    <?= $form->field($model, 'log_date') ?>

    <?= $form->field($model, 'value1') ?>

    <?php // echo $form->field($model, 'value2') ?>

    <?php // echo $form->field($model, 'value3') ?>

    <?php // echo $form->field($model, 'value4') ?>

    <?php // echo $form->field($model, 'value5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
