<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

$this->title = CommonActionLabelEnum::VIEW ."" . AppVocabularySearch::getValueByKey(' Informasi Asset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Asset Item '), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-item-view box box-primary">
	<?php /*
    <div class="box-header with-border">
        <p>
            <?php
            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
            ?>
            <?= Html::a('<i class="fa fa-inbox"></i> Export PDF', ['gen-pdf', 'c' => $ic], [
                'class' => 'btn btn-success',
            ]);
            ?>
        </p>
    </div>
    */ 
    ?>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?= $this->render('_foto', [
			    'model' => $model,
			]) ?>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<?= $this->render('_qrcode', [
			    'model' => $model,
			]) ?>
			
		</div>
	</div>


	
	<div class="box-header with-border">
	  <h3 class="box-title">Informasi Ruangan</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_asset_item',
			[
                'label' => 'Jenis Ruangan',
                'attribute'=>'assetMaster.asset_name',
                //'filter'=>Html::activeDropDownList($searchModel, 'id_supplier', $datalist, ['class' => 'form-control']),
            ],
			[
                'label' => 'Nama Ruangan',
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

			/*
			[
				'label' => 'Type',
				'attribute' => 'assetItemType1.type_asset_item',
			],
			[
				'label' => 'Status',
				'attribute' => 'assetItemType2.type_asset_item',
			],
			*/
			/*
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
			*/
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
</div>


<?php /*
<div class="dokumentasi-view box box-primary">	
	<div class="box-header with-border">
	  <h3 class="box-title">Cetak Barcode & QR-Code</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>

	<div class="box-header with-border">
	<h4>Barcode</h4>
		<?php
		$i = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_asset_item);
        echo Html::a(
                'CETAK BARCODE',
                ['asset-item-main/generate-barcode', 'i' => $i, 'label' => 1,],
                ['class' => 'btn btn-warning btn-sm']);
        ?>
	</div>
	<div class="box-header with-border">
	<h4>QR-CODE</h4>
		<?php
        echo Html::a(
                'TAMPILKAN QR-CODE',
                ['asset-item-main/generate-qrcode', 'i' => $i, 'label' => 1,],
                ['class' => 'btn btn-info btn-sm']);
        ?>
	</div>
</div>
*/ ?>