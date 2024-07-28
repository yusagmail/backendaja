<?php

use yii\helpers\Html;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMaster;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;

/* @var $this yii\web\View */
/* @var $model backend\models\TypeAsset1 */

$kategori = AssetMaster::find()
			->where(['id_asset_master' => $am])->one();
$topik = "";
if($kategori != null){
	$topik = $kategori->asset_name;
}

$this->title = CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey(' Aset ').$topik;
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Inventarisasi Aset'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-asset1-create">

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
    <?php 
	echo $this->render('_view', [
        'model' => $modelLocation,
    ]) 
	
	?>
	</div>
</div>

    <?= $this->render('_form-add-item', [
        'model' => $model,
		'varian_group' =>$varian_group
    ]) ?>

</div>
