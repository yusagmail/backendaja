<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SensorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Navigation';
$this->params['breadcrumbs'][] = $this->title;
//$listdata=\yii\helpers\ArrayHelper::map(\backend\models\MarketPlace::find()->asArray()->all(), 'id_marketplace', 'marketplace_name');
?>
<div class="sensor-index box box-header">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => ['font-size'=>'12px']],
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'info', 'heading' => 'Data '. $this->title],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_sensor',
            
//            'marketPlace.marketplace_name',
            /*
            [
                'attribute'=>'assetItem.number1',
            ],
            */
            [
                'attribute' => 'id_asset_item',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->assetItem)) {
                        return $data->assetItem->number1;
                    } else {
                        return "--";
                    }
                },
                'contentOptions' => ['style' => 'width: 140px;'],
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
            ],
            'sensor_name',
            /*
            [
                'label' => 'Pemilik',
                'attribute'=>'marketPlace.marketplace_name',
                'filter'=> Html::activeDropDownList($searchModel, 'id_marketplace', $listdata, ['class'=>'form-control','prompt'=>'- Select Pemilik -']),
            ],
            */
            //'description:ntext',
            'imei',
            //'cid',
            //'barcode1',
            'sensor_analog1',
			'last_update',
            [
               'label'=>'Real Time Navigation',
               'format' => 'raw',
               'value'=>function ($data) {
                   $id = EncryptionDB::encryptor("encrypt",$data->id_sensor);
                   return Html::a('Real Time Navigation', ['real-time-navigation', 'u' => $id], ['class' => 'btn btn-sm btn-success']);
                },
            ],
            [
               'label'=>'Virtual Navigation',
               'format' => 'raw',
               'value'=>function ($data) {
                   $id = EncryptionDB::encryptor("encrypt",$data->id_sensor);
                   return Html::a('Virtual Navigation', ['virtual-navigation', 'u' => $id], ['class' => 'btn btn-sm btn-info']);
                },
            ],
            /*
			[
			   'label'=>'Detail',
			   'format' => 'raw',
			   'value'=>function ($data) {
                   $id = EncryptionDB::encryptor("encrypt",$data->id_sensor);
                   return Html::a('DETAIL', ['detail', 'u' => $id], ['class' => 'btn btn-sm btn-success']);
				},
			],
            */
            //'sensor_analog2',
            //'sensor_analog3',
            //'sensor_analog4',
            //'sensor_analog5',
            //'sensor_analog6',
            //'sensor_digital1',
            //'sensor_digital2',
            //'sensor_digital3',
            //'sensor_digital4',
            //'sensor_digital5',
            //'sensor_digital6',
            
            //'last_user_update',
            //'last_update_ip_address',
            //'token',
            //'flag_new_changes',
            //'flag_ack_devices',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
