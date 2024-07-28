<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Regional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="regional-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?php //= $form->field($model, 'id_regional')->textInput(['maxlength' => true]) ?>

        <?php //= $form->field($model, 'id_witel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'treg')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_witel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'datel')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
