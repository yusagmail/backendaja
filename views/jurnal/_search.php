<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JurnalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_jurnal') ?>

    <?= $form->field($model, 'id_type_jurnal') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'id_akun_debit') ?>

    <?= $form->field($model, 'debit') ?>

    <?php // echo $form->field($model, 'id_akun_kredit') ?>

    <?php // echo $form->field($model, 'kredit') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
