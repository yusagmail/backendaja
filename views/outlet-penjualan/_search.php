<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OutletPenjualanSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outlet-penjualan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_outlet_penjualan') ?>

    <?= $form->field($model, 'nama_outlet') ?>

    <?= $form->field($model, 'kode_outlet') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'kota') ?>

    <?= $form->field($model, 'logo') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
