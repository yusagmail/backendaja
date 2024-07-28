<?php

use kartik\select2\Select2;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AccountCode */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="account-code-form box box-primary">

    <style>
        div.required label.control-label:after {
            content: ' *';
            color: red;
        }
    </style>

    <?php
    //CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
    ?>
    <style>
        .form-group {
            margin-bottom: 2px;
        }
    </style>
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        //'action' => ['index1'],
        //'method' => 'get',
        'options' => ['encrypt'=>'multipart/form-data'],
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]); ?>
    <br>
    <?php $dataAssetMaster = ArrayHelper::map(\backend\models\AccountCode::find()->asArray()->all(), 'id_account_code', 'account_name');
    echo $form->field($model, 'id_account_code_parent')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Method'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Account Code Parent'); ?>

    <?= $form->field($model, 'account_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_name')->textInput(['maxlength' => true]) ?>

    <div class="box-footer" style="
    margin-left: 12px;">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
