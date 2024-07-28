<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JPembelianSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jpembelian-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_j_pembelian') ?>

    <?= $form->field($model, 'id_material_support') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'total_biaya') ?>

    <?= $form->field($model, 'no_bukti') ?>

    <?php // echo $form->field($model, 'tanggal_pembelian') ?>

    <?php // echo $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'tahun') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
