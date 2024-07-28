<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemProductComponent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-product-component-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mst_product_component')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_urut')->textInput() ?>

    <?= $form->field($model, 'no_urut_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'barcode_item_kode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'catatan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_gudang')->textInput() ?>

    <?= $form->field($model, 'created_id_user')->textInput() ?>

    <?= $form->field($model, 'created_date')->textInput() ?>

    <?= $form->field($model, 'created_ip_address')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
