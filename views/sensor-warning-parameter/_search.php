<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorWarningParameterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-warning-parameter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sensor_warning_parameter') ?>

    <?= $form->field($model, 'parameter_number') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'batas_bawah') ?>

    <?= $form->field($model, 'batas_atas') ?>

    <?php // echo $form->field($model, 'need_warning') ?>

    <?php // echo $form->field($model, 'color_label') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
