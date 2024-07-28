<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box-body" style="">

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_asset_item',
            [
                'label' => 'Nama Barang',
                'attribute'=>'assetMaster.asset_name',
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
            [
                'label' => 'Kode Barang',
                'attribute'=>'number1',
              //  'filter'=>Html::activeDropDownList($searchModel, 'id_asset_item_type1', $datalist, ['class' => 'form-control']),
            ],
            [
                'label' => 'Kode Inventaris',
                'attribute'=>'number2',
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
        
//            'id_asset_item',
            //'id_asset_master',
            
            // [
            //     'attribute'=>'sensor.sensor_name',
            // ],
            /*
            [
                //'label' => 'Supplier Name',
                'attribute'=>'assetMaster.asset_code',
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
            */
            /*
            [
                'attribute'=>'assetItemLocation.address',
                
            ],
            */
            [
                'label' => 'Type',
                'attribute' => 'assetItemType1.type_asset_item',
            ],
            [
                'label' => 'Status',
                'attribute' => 'assetItemType2.type_asset_item',
            ],
            [
                'label' => 'Nama Pelanggan',
                'attribute' => 'id_customer',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->customer)) {
                        return $data->customer->nama_customer;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
            ],
            [
                'label' => 'Latitude',
                'attribute' => 'id_customer',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->customer)) {
                        return $data->customer->latitude;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
            ],
            [
                'label' => 'Longitude',
                'attribute' => 'id_customer',
                'format' => 'raw',
                'value' => function ($data) {
                    if (isset($data->customer)) {
                        return $data->customer->longitude;
                    } else {
                        return "--";
                    }
                },
                //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
            ],
            //'label1',
            //'label2',
            /*
            [
                'label' => 'Type Asset',
                'attribute'=>'assetMaster.typeAsset1.type_asset',
                
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
            */
            /*
            [
                'attribute'=>'assetItemLocation.kabupatenOne.nama_kabupaten',
            ],
            [
                'attribute'=>'assetItemLocation.kecamatanOne.nama_kecamatan',
            ],
            [
                'attribute'=>'assetItemLocation.kelurahan.nama_kelurahan',
            ],
            [
                'attribute'=>'assetReceived.notes1',
            ],
            [
                'attribute'=>'assetItemLocation.keterangan1',
            ],
            [
                'attribute'=>'assetItemLocation.latitude',
            ],
            [
                'attribute'=>'assetItemLocation.longitude',
            ],
            [
                'attribute'=>'assetItemLocation.batas_utara',
            ],
            [
                'attribute'=>'assetItemLocation.batas_selatan',
            ],
            [
                'attribute'=>'assetItemLocation.batas_barat',
            ],
            [
                'attribute'=>'assetItemLocation.batas_timur',
            ],


            [

                'attribute'=>'assetItemLocation.luas',
                'format'=>['integer']
            ],
            [
                'attribute'=>'assetReceived.received_year',
            ],
            [
                'attribute'=>'assetReceived.price_received',
                'format'=>['currency',''],

                
            ],
            [
                //'label' => 'Supplier Name',
                'attribute'=>'assetReceived.statusReceived.status_received',
                
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
            */
        ],
    ]) ?>
</div>
