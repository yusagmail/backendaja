<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="structure-product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_structure_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'result_id_mst_product_component')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_mrp_project')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'id_job')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duration')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
