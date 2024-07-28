<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Witel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="witel-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'id_witel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'nama_witel')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'datel')->textInput(['maxlength' => true]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
