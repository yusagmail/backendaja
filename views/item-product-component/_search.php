<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemProductComponentSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-product-component-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_item_product_component') ?>

    <?= $form->field($model, 'id_mst_product_component') ?>

    <?= $form->field($model, 'kode_item') ?>

    <?= $form->field($model, 'nama_item') ?>

    <?= $form->field($model, 'no_urut') ?>

    <?php // echo $form->field($model, 'no_urut_kode') ?>

    <?php // echo $form->field($model, 'barcode_item_kode') ?>

    <?php // echo $form->field($model, 'catatan') ?>

    <?php // echo $form->field($model, 'id_gudang') ?>

    <?php // echo $form->field($model, 'created_id_user') ?>

    <?php // echo $form->field($model, 'created_date') ?>

    <?php // echo $form->field($model, 'created_ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
