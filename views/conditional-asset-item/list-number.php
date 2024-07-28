<?php

use common\utils\EncryptionDB;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use backend\models\AssetMaster;
use backend\models\AssetItem_Generic;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = CommonActionLabelEnum::LIST_ALL ." " . AppVocabularySearch::getValueByKey('Inventarisasi Aset');
$this->params['breadcrumbs'][] = $this->title;

$asset_type_asset_item1 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem1::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_type_asset_item2 = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(TypeAssetItem2::find()->all(), 'id_type_asset_item', 'type_asset_item');
$asset_kelurahan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kelurahan::find()->all(), 'id_kelurahan', 'nama_kelurahan');
$asset_kecamatan = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kecamatan::find()->all(), 'id_kecamatan', 'nama_kecamatan');
$asset_kabupaten = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Kabupaten::find()->all(), 'id_kabupaten', 'nama_kabupaten');


$datalist = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>
<div class="asset-item-index box box-primary">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>

            <?php
            /*
            <?= Html::button('Import File',
                ['value' => Url::to(['/asset-in-asset/import-file']),
                    'title' => 'Upload Data', 'class' => 'showModalButton btn btn-success']); ?>
           */
            ?>

        </p>
    </div>
   <div class="box-body">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetItem_Generic::tableName(),"",false);
		$datalistAsetMaster = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
		$colAsetMaster = [
            'attribute' => 'id_asset_master',
            'value' => function ($model) {
                if(isset($model->assetMaster)){
					return $model->assetMaster->asset_name;
				}else{
					return "--";
				}
            },
            'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $datalistAsetMaster, ['class' => 'form-control']),
        ];
		
		$listAction = ['class' => 'yii\grid\ActionColumn',
			'template'=>'{view} {update} {delete}',
			'buttons'=>[
				'view' => function ($url, $model) {
					$ic = EncryptionDB::encryptor("encrypt",$model->id_asset_item);
					$url = Url::toRoute(['view', 'c'=>$ic]);
					return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
						'title' => Yii::t('app', 'view'),
					]);
				},
				'update' => function ($url, $model) {
					$url = Url::toRoute(['live', 'u'=>'test']);
					return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
						'title' => Yii::t('app', 'update'),
					]);
				},
			], 
			'header' => CommonActionLabelEnum::ACTION
		];
		$listColumnDynamic[] = $listAction;
		
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_asset_master', $colAsetMaster);

		
		/*
        $colIsActive = [
            'attribute' => 'is_active',
            'value' => function ($model) {
                return $model->is_active == 0 ? CommonActionLabelEnum::IN_ACTIVE : CommonActionLabelEnum::ACTIVE;
            },
            'filter' => Html::activeDropDownList($searchModel, 'is_active', $datalist, ['class' => 'form-control']),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'is_active', $colIsActive);
		*/
		/*
		$btnDetail = 
				['class' => 'yii\grid\ActionColumn',
                    'template' => ' {status-action}',  // the default buttons + your custom button
                    'header' => 'Detail',
                    'buttons' => [
                        'status-action' => function ($url, $model, $key) use ($c) {     // render your custom button
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
                            $urlpeta = Url::toRoute(['/asset-in-asset/view-detail', 'ic' => $ic, 'c'=>$c]);
                            return Html::a('Detail', $urlpeta, ['class' => 'btn btn-sm btn-success']);
                        }
                ]];
		$listColumnDynamic[] = $btnDetail;
		*/
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Inventarisasi Aset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' =>  $listColumnDynamic
        ]); ?>
    </div>
</div>
