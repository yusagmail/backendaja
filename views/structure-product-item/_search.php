<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProductItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structure-product-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_structure_product_item') ?>

    <?= $form->field($model, 'id_structure_product') ?>

    <?= $form->field($model, 'item_id_mst_product_component') ?>

    <?= $form->field($model, 'quantity') ?>

    <?= $form->field($model, 'id_satuan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
