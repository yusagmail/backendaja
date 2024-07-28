<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDeliveryOrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-delivery-order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_supplier_delivery_order') ?>

    <?= $form->field($model, 'id_supplier') ?>

    <?= $form->field($model, 'nomor_surat_jalan') ?>

    <?= $form->field($model, 'tanggal_surat_jalan') ?>

    <?= $form->field($model, 'nomor_invoice') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
