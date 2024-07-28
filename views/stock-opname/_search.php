<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-opname-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_stock_opname') ?>

    <?= $form->field($model, 'tanggal_stock_opname') ?>

    <?= $form->field($model, 'nama_kegiatan') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?= $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
