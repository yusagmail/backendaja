<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AssetMaster;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingDevice */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: " *";
        color: red;
    }

    .form-group {
        margin-bottom: 0px;
    }

</style>
<div class="asset-item-tracking-device-form box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
        </p>
    </div>

    <div class="box-header with-border">
        <?php $form = ActiveForm::begin([
            'layout' => 'horizontal',
            //'action' => ['index1'],
            //'method' => 'get',
            'fieldConfig' => [
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-2',
                    'wrapper' => 'col-sm-8',
                ],
            ],
        ]); ?>

        <?php 
            $dataPost=\backend\models\AssetItem::getListAssetItem();
            echo $form->field($model, 'id_asset_item')
                ->dropDownList(
                    $dataPost,           
                    ['prompt' => '-Choose a Asset Item-']
                );
        ?>

        <?= $form->field($model, 'number_device')->textInput() ?>

        <?= $form->field($model, 'installed_date')->widget(
                DatePicker::className(), [
                 'inline' => false, 
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
        ?>

        <?php
        echo $form->field($model, 'installed_by')->dropDownList(
            ['1' => 'Admin', '2' => 'Amanda', '3' => 'Sudirmans', '4' => 'Badak'
            , '5' => 'Cicak', '6' => 'Dana', '7' => 'Edane', '8' => 'Fafa'
            , '9' => 'Maria', '10' => 'Dudung', '11' => 'Mamaria', '12' => 'Outlet Jakarta']
            ); 
        ?>

        <?php
        echo $form->field($model, 'status_active')->dropDownList(
            ['0' => 'No', '1' => 'Yes']
            ); 
        ?>

        <?= $form->field($model, 'notes')->textarea(['maxlength' => true, 'row'=>6]) ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
