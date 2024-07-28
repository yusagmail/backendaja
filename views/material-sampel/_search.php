<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSampelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-sampel-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_material_sampel') ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'nama_sampel') ?>

    <?= $form->field($model, 'id_material_raw_kategori') ?>

    <?= $form->field($model, 'tanggal_minta_sampel') ?>

    <?php // echo $form->field($model, 'tanggal_keluar_sampel') ?>

    <?php // echo $form->field($model, 'id_subcontractor') ?>

    <?php // echo $form->field($model, 'id_material') ?>

    <?php // echo $form->field($model, 'id_material_kategori1') ?>

    <?php // echo $form->field($model, 'id_material_kategori2') ?>

    <?php // echo $form->field($model, 'id_material_kategori3') ?>

    <?php // echo $form->field($model, 'kode_barcode') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
