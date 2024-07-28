<?php

use backend\models\AssetItem;
use backend\models\AssetMaster;
use kartik\select2\Select2;
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

    .ui-autocomplete {
        max-height: 170px;
        overflow-y: auto;
        /* prevent horizontal scrollbar */
        overflow-x: hidden;
        /* add padding to account for vertical scrollbar */
        padding-right: 10px;

    }

    #ui-id-1::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #ui-id-1::-webkit-scrollbar {
        width: 12px;
        background-color: #F5F5F5;
    }

    #ui-id-1::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, .3);
        background-color: #555;
    }
</style>
<div class="asset-master-request-search">

    <?php
    $form = \yii\bootstrap\ActiveForm::begin([
        'layout' => 'horizontal',
        'action' => ['update-condition'],
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

    <!--    --><?php //$form->field($model, 'id_asset_master_request') ?>
    <br>
    <?php $dataAssetMaster = ArrayHelper::map(AssetMaster::find()->asArray()->all(), 'id_asset_master', 'asset_name');
    echo $form->field($model, 'id_asset_master')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Kategori Aset');  ?>

    <?php 
	/*
	$dataAssetMaster = ArrayHelper::map(AssetItem::find()->asArray()->all(), 'id_asset_item', 'label1');
    echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
        'data' => $dataAssetMaster,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nomor Aset');  
	*/
	?>
	
	<?php
	$datas = \backend\models\AssetItem::find()
		->orderBy(['id_asset_master'=>SORT_ASC, 'number1'=>SORT_ASC])
		->all();
	$listValueAssetItem = array();
	foreach($datas as $data){
		if(isset($data->assetMaster)){
			$listValueAssetItem[$data->id_asset_item] = $data->assetMaster->asset_name.' - '.$data->number1;
		}else{
			$listValueAssetItem[$data->id_asset_item] = $data->id_asset_master.' - '.$data->number1;
		}
	}
	
    echo $form->field($model, 'id_asset_item')->widget(Select2::classname(), [
        'data' => $listValueAssetItem,
        'options' => ['placeholder' => 'Pilih Asset'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Nomor Aset'); 
	?>


    <!--    --><?php //$form->field($model, 'request_datetime') ?>

    <!--    --><?php //$form->field($model, 'request_notes') ?>

    <?php // echo $form->field($model, 'requested_by') ?>

    <?php // echo $form->field($model, 'requested_user_id') ?>

    <?php // echo $form->field($model, 'requested_ip_address') ?>

    <div class="box-footer clearfix">
        <div class="form-group" style="margin-left: 1px">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <?php \yii\bootstrap\ActiveForm::end(); ?>

</div>

