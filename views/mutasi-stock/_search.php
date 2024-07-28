<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mutasi-stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mutasi_stock') ?>

    <?= $form->field($model, 'tanggal_mutasi') ?>

    <?= $form->field($model, 'id_gudang_asal') ?>

    <?= $form->field($model, 'id_gudang_tujuan') ?>

    <?= $form->field($model, 'id_pemberi_perintah') ?>

    <?php // echo $form->field($model, 'id_pelaksana_perintah') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
