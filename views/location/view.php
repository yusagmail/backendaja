<?php

use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\Location;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Location */

$baseName = AppVocabularySearch::getValueByKey('Location');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary location-view">

    <div class="box-header with-border">

        <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_location], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_location], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        </p>

        <?php
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(Location::tableName());

		//Propinsi
		$coltypeAsset = [
			'label' => 'Propinsi',
			'attribute' => 'id_propinsi',
			'value'=>function ($data) {
				if(isset($data->propinsi)){
					return $data->propinsi->nama_propinsi;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_propinsi', $coltypeAsset);


		//Kabupaten
		$coltypeAsset = [
			'label' => 'Kabupaten',
			'attribute' => 'id_kabupaten',
			'value'=>function ($data) {
				if(isset($data->kabupaten)){
					return $data->kabupaten->nama_kabupaten;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kabupaten', $coltypeAsset);

		//Kecamatan
		$coltypeAsset = [
			'label' => 'Kecamatan',
			'attribute' => 'id_kecamatan',
			'value'=>function ($data) {
				if(isset($data->kecamatan)){
					return $data->kecamatan->nama_kecamatan;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kecamatan', $coltypeAsset);


		//Kelurahan
		$coltypeAsset = [
			'label' => 'Kelurahan',
			'attribute' => 'id_kelurahan',
			'value'=>function ($data) {
				if(isset($data->kelurahan)){
					return $data->kelurahan->nama_kelurahan;
				}else{
					return "--";
				}
			}
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceViewElement($listColumnDynamic, 'id_kelurahan', $coltypeAsset);


        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) ?>

</div>
