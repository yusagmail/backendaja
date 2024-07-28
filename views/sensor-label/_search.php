<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorLabelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-label-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sensor_label') ?>

    <?= $form->field($model, 'id_sensor_type') ?>

    <?= $form->field($model, 'type_channel') ?>

    <?= $form->field($model, 'channel_number') ?>

    <?= $form->field($model, 'channel_name') ?>

    <?php // echo $form->field($model, 'batas_bawah') ?>

    <?php // echo $form->field($model, 'is_warning_batas_bawah') ?>

    <?php // echo $form->field($model, 'color_batas_bawah') ?>

    <?php // echo $form->field($model, 'batas_atas') ?>

    <?php // echo $form->field($model, 'is_warning_batas_atas') ?>

    <?php // echo $form->field($model, 'color_batas_atas') ?>

    <?php // echo $form->field($model, 'color_normal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
