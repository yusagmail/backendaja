<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitProduksiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unit-produksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_unit_produksi') ?>

    <?= $form->field($model, 'nama_unit') ?>

    <?= $form->field($model, 'lokasi') ?>

    <?= $form->field($model, 'foto1') ?>

    <?= $form->field($model, 'desc_fungsi') ?>

    <?php // echo $form->field($model, 'desc_material_in') ?>

    <?php // echo $form->field($model, 'desc_proses') ?>

    <?php // echo $form->field($model, 'desc_material_out') ?>

    <?php // echo $form->field($model, 'jumlah_operator') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
