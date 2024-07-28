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
$this->title = "Update Posisi di Peta";
$dataListAssetTypeAsetItem3 = ArrayHelper::map(TypeAssetItem3::find()->asArray()->all(), 'id_type_asset_item', 'type_asset_item');
?>
<div class="asset-item-view box box-primary">
	<div class="box-header with-border">
	  <h3 class="box-title"><?= AppVocabularySearch::getValueByKey('Posisi Asset') ?> di Peta</h3>

	  <div class="box-tools pull-right">
		<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
		</button>
		<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
	  </div>
	</div>
	<div class="box-body" style="">
	<?php
		//echo $varian_group;
		switch($varian_group){
			case "id_asset_master#10":
				echo $this->render('_map_edit_titik', [
					'model' => $model,
					'varian_group' =>$varian_group
				]);
				break;
			
			case "id_asset_master#11":
				echo $this->render('_map_edit_area', [
					'model' => $model,
					'varian_group' =>$varian_group
				]);
				break;
				
			case "id_asset_master#12":
				echo $this->render('_map_edit_area', [
					'model' => $model,
					'varian_group' =>$varian_group
				]);
				break;
		}
	?>
	</div>
</div>