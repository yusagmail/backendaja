<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMapping */
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
<div class="asset-item-mapping-form">

    
    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => ['encrypt' => 'multipart/form-data'], //Tambahkan ini untuk fitur upload
        'fieldConfig' => [
            'horizontalCssClasses' => [
                'label' => 'col-lg-2',
                'offset' => 'col-lg-offset-2',
                'wrapper' => 'col-lg-10',
            ],
        ],
    ]); ?>
    <?php //= $form->field($model, 'id_asset_item')->textInput() ?>

    <?php
    $dataAssetItem = ArrayHelper::map(
        \backend\models\AssetItem::find()->all(),
        'id_asset_item',
        function($model) {
            $nama_barang = "x";
            if(isset($model->assetMaster)){
                $nama_barang = $model->assetMaster->asset_name;
            }
            return $model['number1'].' - '.$nama_barang;
        }
    );
    //        $dataAssetMaster = ArrayHelper::map(\backend\models\Vendor::find()->asArray()->all(), 'id_vendor', 'name');
    echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
        'data' => $dataAssetItem,
        'options' => ['placeholder' => 'Pilih Aset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    $dataSensor = ArrayHelper::map(
        \backend\models\Sensor::find()->all(),
        'id_asset_item',
        function($model) {
            $kode = $model->cid;
            return $model['sensor_name'].' - '.$kode;
        }
    );

    echo $form->field($model, 'id_sensor')->widget(Select2::classname(), [
        'data' => $dataSensor,
        'options' => ['placeholder' => 'Pilih Sensor'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_sensor')->textInput() ?>

    <?php
    $dataPoint = ArrayHelper::map(
        \backend\models\Point::find()->all(),
        'id_point',
        function($model) {
            return $model['name'];
        }
    );

    echo $form->field($model, 'id_point')->widget(Select2::classname(), [
        'data' => $dataPoint,
        'options' => ['placeholder' => 'Pilih Point'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php //= $form->field($model, 'id_point')->textInput() ?>

    <div class="box-footer clearfix">
        <div class="form-group">
            <?= Html::submitButton('Simpan', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
