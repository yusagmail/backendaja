<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BasePendapatan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="base-pendapatan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_pendapatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
