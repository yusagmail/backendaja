<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\models\AssetReceivedSearch */
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
<?php
//CSS Ini digunakan untuk overide jarak antar form biar tidak terlalu jauh
?>
<style>
    .form-group {
        margin-bottom: 0px;
    }
</style>
<div class="asset-received-search">
<br>
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
        ['prompt' => '--BULAN--'])->label('Bulan'); */?>
    <?php $dataAssetReceived2 = ArrayHelper::map(\backend\models\AssetReceived::find()->asArray()->all(), 'received_year', 'received_year'); ?>
    <?php /*echo $form->field($model, 'received_year')->dropDownList($dataAssetReceived2,
        ['prompt' => '--TAHUN--'])->label('Tahun Penerimaan Asset'); */?>
    <?= $form->field($model, 'received_year')->dropDownList($model->getYearsList())->label('Tahun Penerimaan'); ?>

    <?php // echo $form->field($model, 'price_received') ?>

    <?php // echo $form->field($model, 'quantity') ?>

    <?php // echo $form->field($model, 'id_status_received') ?>

    <div class="box-footer clearfix">
        <div class="form-group" style="margin-left: 1px">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
