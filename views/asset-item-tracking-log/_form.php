<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AssetMaster;
use backend\models\AssetItem;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use dosamigos\datepicker\DatePicker;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemTrackingLog */
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
<div class="asset-item-tracking-log-form box box-success">

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
        /*
        $dataAssetItem = ArrayHelper::map(AssetItem::find()->all(), 'id_asset_item ', 'number1');
        echo $form->field($model, 'id_asset_item')->dropDownList($dataAssetItem,
            ['prompt' => '-Choose a Asset Item-']); 
        */
        ?>

        <?php
        /*
            foreach($dataAssetItem as $data){
                echo $data;
            }   

            $models = AssetItem::find()->all();
            foreach($models as $mod){
                echo $mod->number1;
                echo '<br>';
            }
            */
        ?>

        <?php 
            $dataPost=\backend\models\AssetItem::getListAssetItem();
            echo $form->field($model, 'id_asset_item')
                ->dropDownList(
                    $dataPost,           
                    ['prompt' => '-Choose a Asset Item-']
                );
        ?>

        <?= $form->field($model, 'id_device_tracking')->textInput() ?>

        <?= $form->field($model, 'log_date')->widget(
                DatePicker::className(), [
                 'inline' => false, 
                //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
                'clientOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]);
        ?>
        
        <?= $form->field($model, 'log_datetime')->widget(DateTimePicker::className(), [
                'language' => 'en',
                'size' => 'ms',
                //'template' => '{input}',
                //'pickButtonIcon' => 'glyphicon glyphicon-time',
                'inline' => false,
                'clientOptions' => [
                    'startView' => 1,
                    'minView' => 0,
                    'maxView' => 1,
                    'autoclose' => true,
                    'format' => 'HH:ii P', // if inline = false
                    'todayBtn' => true
                ]
            ]);
        ?>

        <?= $form->field($model, 'device_logtime')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'full_message')->textInput(['maxlength' => true]) ?>

        <div class="box-footer">
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
