<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use backend\models\AssetMaster;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use kartik\select2\Select2;

// use backend\models\Sensor;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asset-item-form">
	<div class="box-footer">
	<div class="form-group">


    <?php
    $dataAssetItem = ArrayHelper::map(
        \backend\models\AssetMaster::find()->all(),
        'id_asset_master',
        function($model) {
            return $model['asset_code'].' - '.$model['asset_name'];
        }
    );
    //        $dataAssetMaster = ArrayHelper::map(\backend\models\Vendor::find()->asArray()->all(), 'id_vendor', 'name');
    echo $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
        'data' => $dataAssetItem,
        'options' => ['placeholder' => 'Pilih Aset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Asset Master'); ?>

    <?php //= $form->field($model, 'id_asset_master')->textInput() ?>
	
	</div>
	</div>
</div>
