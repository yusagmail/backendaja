<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ReferencePoint */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }
</style>

<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="point-form" style="margin-left: 15px">
    <?php if ($action == "create") {
        $action = ['save-create'];
    }
    if ($action == "update") {
        $action = ['save-update'];
    }
    ?>
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-submit',
        'action' => $action,
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-6',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-6',
            ],
        ],
    ]); ?>
    <?= $form->field($model, 'id_reference_point')->hiddenInput(['maxlength' => true])->label(false); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'display_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>