<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mutasi-stock-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mutasi_stock')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_finish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
