<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameStatusSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-opname-status-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_stock_opname_status') ?>

    <?= $form->field($model, 'id_stock_opname') ?>

    <?= $form->field($model, 'id_gudang') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'tgl_dibuat') ?>

    <?php // echo $form->field($model, 'waktu_mulai') ?>

    <?php // echo $form->field($model, 'waktu_terakhir') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <?php // echo $form->field($model, 'modified_date') ?>

    <?php // echo $form->field($model, 'modified_id_user') ?>

    <?php // echo $form->field($model, 'modified_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
