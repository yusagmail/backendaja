<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectProductItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mrp-project-product-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mrp_project')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mst_product_component')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plan_start_date')->textInput() ?>

    <?= $form->field($model, 'plan_end_date')->textInput() ?>

    <?= $form->field($model, 'actual_start_date')->textInput() ?>

    <?= $form->field($model, 'actual_end_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
