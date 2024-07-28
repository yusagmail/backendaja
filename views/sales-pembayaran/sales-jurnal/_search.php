<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-jurnal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sales_jurnal') ?>

    <?= $form->field($model, 'type') ?>

    <?= $form->field($model, 'id_sales_order') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?php // echo $form->field($model, 'id_akun_debit') ?>

    <?php // echo $form->field($model, 'debit') ?>

    <?php // echo $form->field($model, 'id_akun_kredit') ?>

    <?php // echo $form->field($model, 'kredit') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'bayar_cara') ?>

    <?php // echo $form->field($model, 'id_bank_pembayaran') ?>

    <?php // echo $form->field($model, 'bayar_bukti') ?>

    <?php // echo $form->field($model, 'jumlah_bayar') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
