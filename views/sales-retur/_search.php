<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesReturSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-retur-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_sales_retur') ?>

    <?= $form->field($model, 'id_sales_order') ?>

    <?= $form->field($model, 'tanggal_retur') ?>

    <?= $form->field($model, 'alasan_retur') ?>

    <?= $form->field($model, 'id_penerima_barang') ?>

    <?php // echo $form->field($model, 'catatan_kondisi_barang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
