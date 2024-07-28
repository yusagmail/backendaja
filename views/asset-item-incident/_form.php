<?php

use backend\models\AssetMaster;
use backend\models\AssetItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemIncident */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    div.required label.control-label:after {
        content: ' *';
        color: red;
    }
    .form-group {
        margin-bottom: 0px;
    }
    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-track
    {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
        border-radius: 10px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar
    {
        width: 12px;
        background-color: #F5F5F5;
    }

    #select2-assetitemincident-id_asset_item-results::-webkit-scrollbar-thumb
    {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
        background-color: #555;
    }
</style>
<div class="asset-item-incident-form">
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
    <?php 
	/*
	$dataAssetMaster = ArrayHelper::map(
        \backend\models\AssetItem::find()->asArray()->all(),
        'id_asset_item',
        function($model) {
			if(isset($model->assetMaster)){
				return $model->assetMaster->asset_name.' - '.$model['number1'];
			}else{
				return $model['id_asset_master'].' - '.$model['number1'];
			}
        }
    );
	*/
	
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
    ])->label('Nama Asset'); ?>



    <?= $form->field($model, 'incident_date')->textInput()->label('Tanggal Kejadian')->widget(
        \dosamigos\datepicker\DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'id' => 'assetitemincident-incident_date',
        'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'defaultDate' => date('Y-mm-dd'),

        ]
    ]) ?>

<!--    --><?php //$form->field($model, 'incident_datetime')->textInput() ?>

    <?= $form->field($model, 'incident_notes')->textarea(['rows' => 6])->label('Catatan Kerusakan') ?>


    <?php
    echo $form->field($model, 'photo1')->widget(\kartik\file\FileInput::className(), [
        'pluginOptions' => [
            'showUpload' => false,
            'maxFileSize' => 500,
            'browseLabel' => 'Select Foto Asset',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',

        ],
    ])->label('Foto');
    ?>

    <?= $form->field($model, 'reported_by')->textInput(['maxlength' => true])->label('Dilaporkan Oleh') ?>

<!--    --><?php //$form->field($model, 'reported_user_id')->textInput() ?>

<!--    --><?php //$form->field($model, 'reported_ip_address')->textInput(['maxlength' => true]) ?>

<!--    --><?php //$form->field($model, 'photo2')->textInput() ?>

<!--    --><?php //$form->field($model, 'photo3')->textInput() ?>

<!--    --><?php //$form->field($model, 'photo4')->textInput() ?>

<!--    --><?php //$form->field($model, 'photo5')->textInput() ?>

    <div class="box-footer">
        <div class="form-group">
            <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth() + 1;
        var yyyy = today.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }

        if (mm < 10) {
            mm = '0' + mm;
        }
        today = yyyy + '-' + mm + '-' + dd;
        $("#assetitemincident-incident_date").datepicker({dateFormat: 'Y-mm-dd'}).val(today);
    });
</script>
