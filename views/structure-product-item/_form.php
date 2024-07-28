<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProductItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structure-product-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_structure_product')->textInput() ?>

    <?= $form->field($model, 'item_id_mst_product_component')->textInput() ?>

    <?= $form->field($model, 'quantity')->textInput() ?>

    <?= $form->field($model, 'id_satuan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
