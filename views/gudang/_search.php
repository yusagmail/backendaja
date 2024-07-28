<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\GudangSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gudang-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_gudang') ?>

    <?= $form->field($model, 'nama_gudang') ?>

    <?= $form->field($model, 'kode_gudang') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'deskripsi') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
