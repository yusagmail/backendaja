<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPackingItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="basic-packing-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_basic_packing_item') ?>

    <?= $form->field($model, 'id_basic_packing') ?>

    <?= $form->field($model, 'id_material_support') ?>

    <?= $form->field($model, 'jumlah') ?>

    <?= $form->field($model, 'keterangan') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
