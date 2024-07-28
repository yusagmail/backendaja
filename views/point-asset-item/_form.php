<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Point */
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
<div class="point-form">
    <?php
        if($action == "create"){
            $action = ['save-create'];
        }
        if($action == "update"){
            $action = ['save-update'];

        }
    ?>
    
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' => 'form-submit',
        //'action' => ['save-create'],
        'action' => $action,
        'enableAjaxValidation' => true,
        //'enableAjaxValidation' => true,
        'validationUrl' => 'validation-create',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>

    <?php
        if($action == "update"){
            echo $form->field($model, 'id_point')->textInput(['maxlength' => true]);
        }
    ?>

    <?php
        if($action == "update"){
            $action = ['update-create'];
        }
    ?>
    <?= $form->field($model, 'id_point')->hiddenInput(['maxlength' => true])->label(false); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>

