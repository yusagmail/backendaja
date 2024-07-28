<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SensorWarningParameter */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sensor-warning-parameter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parameter_number')->textInput() ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'batas_bawah')->textInput() ?>

    <?= $form->field($model, 'batas_atas')->textInput() ?>

    <?= $form->field($model, 'need_warning')->textInput() ?>

    <?= $form->field($model, 'color_label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
