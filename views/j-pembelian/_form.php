<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\JPembelian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jpembelian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_j_pembelian')->textInput() ?>

    <?= $form->field($model, 'id_material_support')->textInput() ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <?= $form->field($model, 'total_biaya')->textInput() ?>

    <?= $form->field($model, 'no_bukti')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tanggal_pembelian')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <?= $form->field($model, 'tahun')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
