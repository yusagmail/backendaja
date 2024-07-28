<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\AssetMasterStructure;
use backend\models\AssetItem_Generic;
use backend\models\AssetItemSearch_Generic;
use backend\models\TypeAssetItem3;
use yii\widgets\DetailView;

use common\utils\EncryptionDB;

use backend\models\AppFieldConfigSearch;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

$this->title = CommonActionLabelEnum::VIEW ." " . AppVocabularySearch::getValueByKey('Informasi Asset');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey(' Asset Item '), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
?>
<div class="asset-item-view box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><?= AppVocabularySearch::getValueByKey('Informasi Asset') ?></h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
    <?= $this->render('_view', [
        'model' => $model,
    ]) ?>
	</div>
</div>

<?php
\yii\bootstrap\Modal::begin([
    'header' => 'Asset',
    'id' => 'modal',
    'size' => 'modal-lg',
]);
echo "<div id='modalContent'></div>";
\yii\bootstrap\Modal::end();
?>
<?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
<?php
	$datas= AssetMasterStructure::find()
			->where(['id_asset_master_parent' => $idparent])
			->orderBy(['id_asset_master_structure'=>SORT_ASC])
			->all();
	foreach($datas as $data){
		$labelAssetInSide = $data->assetMasterChild->asset_name;
		//echo $data->assetMasterChild->asset_name."--<br>";
?>
<div class="dokumentasi-view box box-success">
	<div class="box-header with-border">
	  <h3 class="box-title"><?= $labelAssetInSide ?></h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
		<?php
		/*
		$url = Url::toRoute(['supplier-assesment/result', 'is'=>$id_asset_item, 'isa'=>$data->assetMasterChild->id_asset_master]);
		echo Html::a('<button type="button" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Tambah Data '.$labelAssetInSide .'</button>', $url, [
			'title' => Yii::t('app', 'lead-view'),
		]);
		*/
		$varian_group = "id_asset_master#".$data->id_asset_master_child;
		?>

		<?php
		$vg = EncryptionDB::staticEncryptor("encrypt",$varian_group);
		$am = EncryptionDB::staticEncryptor("encrypt",$data->id_asset_master_child);
		$iai = EncryptionDB::staticEncryptor("encrypt",$id_asset_item);
		$ip = EncryptionDB::staticEncryptor("encrypt",$idparent);
		$url = Url::to(['add-item','am'=>$am,'iai'=>$iai, 'ip'=>$ip, 'vg'=>$vg]);
		//echo $url;
		echo Html::button('<i class="fa fa-plus"></i> Tambah Data '.$labelAssetInSide, [
		        'value'=>$url,
            'id' => 'modal',
                'class'=> 'btn btn-sm btn-success modalButton',
                ]);
		?>

		<?php //echo "Data-data ".$labelAssetInSide ?>
		<div class="box-body table-responsive">
        <?php


		$config['varian_group'] = $varian_group;
		$searchModel = new AssetItemSearch_Generic($config);
		$searchModel->id_asset_master = $labelAssetInSide = $data->assetMasterChild->id_asset_master;
		$searchModel->id_asset_item_parent = $id_asset_item;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $config);
		$dataProvider->pagination = false;


		//echo $varian_group;
        $listColumnDynamic = AppFieldConfigSearch::getListGridViewWithHeader(AssetItem_Generic::tableName(), $varian_group, false);

        $coltypeAsset = [
            'label' => 'Jenis Tanaman',
            'attribute' => 'assetItemType3.type_asset_item',
            'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset_item3', $dataListAssetTypeAsetItem3, ['class' => 'form-control']),
        ];

		$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset_item3', $coltypeAsset);
		//$listColumnDynamic[] = ['class' => 'yii\grid\ActionColumn', 'header' => CommonActionLabelEnum::ACTION,];

		$listColumnDynamic[] =
		[
          'class' => 'yii\grid\ActionColumn',
          'header' => 'Aksi',
          'headerOptions' => ['style' => 'color:#337ab7'],
          'template' => '{view}{update}{delete}',
          'buttons' => [
			'view' => function ($url, $model) use ($am, $iai, $ip, $varian_group){
				$url = Url::toRoute(['view-ajax','id'=>$model->id_asset_item,
					'am'=>$am,
					'iai'=>$iai,
					'ip'=>$ip,
					'vg'=>$varian_group,
				]);

				return Html::button('<span class="glyphicon glyphicon-eye-open"></span>', ['value'=>$url, 'class'=> 'modalButton',
                    'style'=>'border: none;padding: 0;background: none;margin-left: 7px; margin-right: 7px;color:#3c8dbc;']);
                /*
				return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                ]);
				*/
            },

            'update' => function ($url, $model) use ($am, $iai, $ip, $vg){
				$url = Url::toRoute(['update-ajax','id'=>$model->id_asset_item,
					'am'=>$am,
					'iai'=>$iai,
					'ip'=>$ip,
					'vg'=>$vg,
				]);

				return Html::button('<span class="glyphicon glyphicon-pencil"></span>', ['value'=>$url, 'class'=> 'modalButton',
                    'style'=>'border: none;padding: 0;background: none;margin-left: 7px; margin-right: 7px;color:#3c8dbc;']);
                /*
				return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                            'title' => Yii::t('app', 'lead-update'),
                ]);
				*/
            },
            'delete' => function ($url, $model) use ($am, $iai, $ip, $vg){
				$url = Url::toRoute(['delete-ajax','id'=>$model->id_asset_item,
					'am'=>$am,
					'iai'=>$iai,
					'ip'=>$ip,
					'vg'=>$vg,
				]);
                return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                            'title' => Yii::t('app', 'lead-delete'),
                    'data' => [
                        'confirm' => 'Apakah anda yakin akan menghapus ?',
                        'method' => 'post',
                    ],

                ]);
            }

          ]
        ];

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' =>  $listColumnDynamic
        ]); ?>
		</div>
	</div>
    <?php Pjax::end(); ?>
</div>
<?php
}
?>

<?php 
	//Display map
	echo $this->render('/map-display/shp-display', [
	'model' => $model,
]) ?>