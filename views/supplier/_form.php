<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Supplier */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="supplier-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_supplier')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pic_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_phone')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
