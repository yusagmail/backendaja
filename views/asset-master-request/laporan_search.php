<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterRequestSearch */
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
<div class="asset-master-search ">
    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['report'],
        'method' => 'get',
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-sm-2',
                'offset' => 'col-sm-offset-2',
                'wrapper' => 'col-sm-8',
            ],
        ],
    ]);
    ?>
    <?php /*$dataAssetReceived = ArrayHelper::map(\backend\models\AssetReceived::find()->asArray()->all(), 'received_date', 'received_date'); ?>
    <?php  echo $form->field($model, 'received_date')->dropDownList($dataAssetReceived,
        ['prompt' => '--BULAN--'])->label('Bulan'); */ ?>
    <?php /*echo $form->field($model, 'received_year')->dropDownList($dataAssetReceived2,
        ['prompt' => '--TAHUN--'])->label('Tahun Penerimaan Asset'); */ ?>
    <?= $form->field($model, 'request_date')->dropDownList($model->getYearsList())->label('Tahun Kebutuhan Asset'); ?>


    <div class="box-footer clearfix">
        <div class="form-group" style="margin-left: 1px">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
