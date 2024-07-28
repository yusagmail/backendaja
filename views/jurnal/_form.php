<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Jurnal */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jurnal-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_type_jurnal')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'id_akun_debit')->textInput() ?>

    <?= $form->field($model, 'debit')->textInput() ?>

    <?= $form->field($model, 'id_akun_kredit')->textInput() ?>

    <?= $form->field($model, 'kredit')->textInput() ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
