<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structure-product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_structure_product') ?>

    <?= $form->field($model, 'result_id_mst_product_component') ?>

    <?= $form->field($model, 'id_mrp_project') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'id_job') ?>

    <?php // echo $form->field($model, 'duration') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
