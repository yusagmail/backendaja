<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-opname-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_stock_opname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_material_finish')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_gudang')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redundat_barcode_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'entry_time')->textInput() ?>

    <?= $form->field($model, 'created_user_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
