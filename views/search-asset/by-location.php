<?php

use common\utils\EncryptionDB;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\Location;
use backend\models\LocationUnit;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseName = AppVocabularySearch::getValueByKey('Location');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>


<?php echo $this->render('_search2', ['model' => $searchModel]); ?>
<div class="location-index box box-success">
    <div class="box-body">
    <?php
    $listColumnDynamic = AppFieldConfigSearch::getListGridView(Location::tableName(),"", false);

    //CustomColumn
    $coltypeAsset = [
        'label' => 'Type',
        'attribute' => 'id_location',
        'filter'=>Html::activeDropDownList($searchModel, 'id_location', ['class' => 'form-control']),
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_location', $coltypeAsset);


	//Propinsi
    $coltypeAsset = [
        'label' => 'Propinsi',
        'attribute' => 'id_propinsi',
        'content'=>function ($data) {
			if(isset($data->propinsi)){
				return $data->propinsi->nama_propinsi;
			}else{
				return "--";
			}
		}
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_propinsi', $coltypeAsset);

	//Kabupaten
    $coltypeAsset = [
        'label' => 'Kabupaten',
        'attribute' => 'id_kabupaten',
        'content'=>function ($data) {
			if(isset($data->kabupaten)){
				return $data->kabupaten->nama_kabupaten;
			}else{
				return "--";
			}
		}
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_kabupaten', $coltypeAsset);

	//Kecamatan
    $coltypeAsset = [
        'label' => 'Kecamatan',
        'attribute' => 'id_kecamatan',
        'content'=>function ($data) {
			if(isset($data->kecamatan)){
				return $data->kecamatan->nama_kecamatan;
			}else{
				return "--";
			}
		}
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_kecamatan', $coltypeAsset);


	//Kelurahan
    $coltypeAsset = [
        'label' => 'Kelurahan',
        'attribute' => 'id_kelurahan',
        'content'=>function ($data) {
			if(isset($data->kelurahan)){
				return $data->kelurahan->nama_kelurahan;
			}else{
				return "--";
			}
		}
    ];
    $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_kelurahan', $coltypeAsset);


	$listPemilik = [
		'label'=> 'Pemilik Bidang',
		'contentOptions' =>function ($model, $key, $index, $column){
                return ['class' => 'box', 'style'=>'width:400px'];
            },
		'content'=>function ($data) {
					

					$records = LocationUnit::find()
						->where(['id_location' => $data->id_location])
						->all();
						
					$stringTable = '<table class="kv-grid-table table table-hover table-bordered table-striped">';
					$stringTable .= '
						<tr>
							<th width="140px">Pemilik</th>
							<th>No.Registrasi</th>
							<th width="80px">Aksi</th>
						</tr>
						';
					foreach($records as $record){
						$ic = EncryptionDB::staticEncryptor('encrypt', $record->id_location_unit);
						$url_detail = Url::toRoute(['/asset-in-location/view-detail', 'c' => $ic]);
						$link = Html::a('View / Update', $url_detail,
							['class' => 'btn btn-xs btn-success']);
						$owner = "--";
						if(isset($record->owner)){
							$owner = $record->owner->name;
						}
						$stringTable .= '
						<tr>
							<td>'.$owner.'</td>
							<td>'.$record->label1.'</td>
							<td>'.$link.'</td>
						</tr>
						';
					}
					$stringTable .= '</table>';
					$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_location);
					$urlAdded = Url::toRoute(['new-survey-unit', 'c' => $ic]);
					$added = Html::a('<i class="fa fa-plus"></i> Tambah Survey', $urlAdded,
							['class' => 'btn btn-xs btn-danger']);
					$stringTable .= $added;
					
					return $stringTable;
				},
	];
	$listColumnDynamic[] = $listPemilik;

	$button = 
		['class' => 'yii\grid\ActionColumn',
			'template' => '{upload-image}',
			'header' => 'Hitung Sentimen',// the default buttons + your custom button
			'contentOptions' => ['style' => 'width: 180px;'],
			'buttons' => [
				'upload-image' => function ($url, $model, $key) {
					$url = Url::toRoute(['count-sentiment',
						 'i' => $model->id_location,
						]);
					$res = Html::a('Hitung Sentimen', $url,
						[
							'class' => 'btn btn-sm btn-success btn-block',
							'data' => [
								//'confirm' => 'Are you sure want to record?',
								'method' => 'post',
							],
						]);
					return $res;
				}
			]
		];
	//$listColumnDynamic[] = $button;
    //echo var_export($listColumnDynamic, true); exit();

    echo \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'primary', 'heading' => $baseName],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => $listColumnDynamic,
    ]); ?>
</div>
</div>
