<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BankPembayaran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-pembayaran-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_bank')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bank_short')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomor_rekening')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'atas_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
