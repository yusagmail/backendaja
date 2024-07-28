<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use backend\models\Location;
use yii\helpers\Html;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseName = AppVocabularySearch::getValueByKey('Location');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="location-index box box-success">
    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE." ".$baseName, ['create'], ['class' => 'btn btn-success']) ?>

            <?php
            /*
            <?= Html::button('Import File',
                ['value' => Url::to(['/asset-item/import-file']),
                    'title' => 'Upload Data', 'class' => 'showModalButton btn btn-success']); ?>
             */
            ?>
        </p>
    </div>
    <div class="box-body">
    <?php
    $listColumnDynamic = AppFieldConfigSearch::getListGridView(Location::tableName());

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


	$col =	[
                'label'=>'Map Edit',
                'format' => 'raw',
                'value'=>function ($data) {
                    $id = EncryptionDB::encryptor("encrypt",$data->id_location);
                    return Html::a('Map Edit', ['map-edit', 'u' => $id], ['class' => 'btn btn-success btn-xs']);
                },
              ];
	$listColumnDynamic[] = $col;
	
	
	$col =	[
                'label'=>'View On Map',
                'format' => 'raw',
                'value'=>function ($data) {
                    $id = EncryptionDB::encryptor("encrypt",$data->id_location);
                    return Html::a('View on Map', ['map-view', 'u' => $id], ['class' => 'btn btn-warning btn-xs']);
                },
              ];
	$listColumnDynamic[] = $col;
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
