<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BankPembayaranSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_bank_pembayaran') ?>

    <?= $form->field($model, 'nama_bank') ?>

    <?= $form->field($model, 'nama_bank_short') ?>

    <?= $form->field($model, 'nomor_rekening') ?>

    <?= $form->field($model, 'atas_nama') ?>

    <?php // echo $form->field($model, 'kode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
