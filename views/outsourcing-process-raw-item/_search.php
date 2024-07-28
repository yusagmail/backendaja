<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRawItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outsourcing-process-raw-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_outsourcing_process_raw_item') ?>

    <?= $form->field($model, 'id_outsourcing_process_raw') ?>

    <?= $form->field($model, 'id_material_raw_kategori') ?>

    <?= $form->field($model, 'yard') ?>

    <?= $form->field($model, 'harga') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
