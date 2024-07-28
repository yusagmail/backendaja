<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PalletGudangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pallet-gudang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pallet_gudang') ?>

    <?= $form->field($model, 'id_gudang') ?>

    <?= $form->field($model, 'nomor_pallet') ?>

    <?= $form->field($model, 'kode') ?>

    <?= $form->field($model, 'pallet_group') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
