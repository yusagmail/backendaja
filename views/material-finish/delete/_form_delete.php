<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinishDelete */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-finish-delete-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'alasan_hapus')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Jalankan Hapus Data', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
