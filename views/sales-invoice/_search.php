<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sales_order') ?>

    <?= $form->field($model, 'tanggal_order') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'id_outlet_penjualan') ?>

    <?= $form->field($model, 'nomor_sales_order') ?>

    <?php // echo $form->field($model, 'nomor') ?>

    <?php // echo $form->field($model, 'month') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'invoice_total') ?>

    <?php // echo $form->field($model, 'bayar_total_bayar') ?>

    <?php // echo $form->field($model, 'bayar_cara') ?>

    <?php // echo $form->field($model, 'bayar_id_bank_pembayaran') ?>

    <?php // echo $form->field($model, 'bayar_uang_muka') ?>

    <?php // echo $form->field($model, 'bayar_bukti') ?>

    <?php // echo $form->field($model, 'status_order') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
