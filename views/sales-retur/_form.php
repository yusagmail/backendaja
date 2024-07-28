<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesRetur */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sales-retur-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_sales_order')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_retur')->textInput() ?>

    <?= $form->field($model, 'alasan_retur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_penerima_barang')->textInput() ?>

    <?= $form->field($model, 'catatan_kondisi_barang')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
