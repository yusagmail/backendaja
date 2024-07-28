<?php

use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use common\labeling\CommonActionLabelEnum;
use backend\models\AssetItem;
use backend\models\AssetItem_Generic;
use backend\models\TypeAssetItem3;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
?>
<div class="asset-item-view box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><?= AppVocabularySearch::getValueByKey('Detail Asset') ?></h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
	<?php
		//echo $varian_group;
		$listColumnDynamic = AppFieldConfigSearch::getListDetailView(AssetItem_Generic::tableName(),$varian_group);

		//CustomColumn
		$coltypeAsset = [
			'attribute' => 'typeAsset1.type_asset',
		];
		$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);

		$coltypeAsset = [
            'label' => 'Jenis Tanaman',
            'attribute' => 'assetItemType3.type_asset_item',
            'filter'=>Html::activeDropDownList($model, 'id_type_asset_item3', $dataListAssetTypeAsetItem3, ['class' => 'form-control']),
        ];

		$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset_item3', $coltypeAsset);

		echo DetailView::widget([
			'model' => $model,
			'attributes' => $listColumnDynamic,
		]) 
	?>
	</div>
</div>