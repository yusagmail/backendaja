<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKreditBayarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-kredit-bayar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer_kredit_bayar') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'tanggal_bayar') ?>

    <?= $form->field($model, 'cara_bayar') ?>

    <?= $form->field($model, 'jumlah_bayar') ?>

    <?php // echo $form->field($model, 'id_bank_pembayaran') ?>

    <?php // echo $form->field($model, 'id_sales_order') ?>

    <?php // echo $form->field($model, 'status_pembayaran') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
