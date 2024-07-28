<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectProductItemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrp-project-product-item-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_mrp_project_product_item') ?>

    <?= $form->field($model, 'id_mrp_project') ?>

    <?= $form->field($model, 'id_mst_product_component') ?>

    <?= $form->field($model, 'plan_start_date') ?>

    <?= $form->field($model, 'plan_end_date') ?>

    <?php // echo $form->field($model, 'actual_start_date') ?>

    <?php // echo $form->field($model, 'actual_end_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
