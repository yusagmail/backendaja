<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PembelianMaterialSupportSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pembelian-material-support-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pembelian_material_support') ?>

    <?= $form->field($model, 'id_material_support') ?>

    <?= $form->field($model, 'tanggal_pembelian') ?>

    <?= $form->field($model, 'nomor_faktur') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?php // echo $form->field($model, 'harga_satuan') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
