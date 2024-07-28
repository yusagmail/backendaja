<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-opname-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_stock_opname_item') ?>

    <?= $form->field($model, 'id_stock_opname') ?>

    <?= $form->field($model, 'id_material_finish') ?>

    <?= $form->field($model, 'id_gudang') ?>

    <?= $form->field($model, 'redundat_barcode_code') ?>

    <?php // echo $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'entry_time') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
