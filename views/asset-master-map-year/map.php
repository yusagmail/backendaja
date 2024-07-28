<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\AssetMaster;
use backend\models\TypeAsset1;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Kebutuhan Asset');
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => 'Choose'] + ArrayHelper::map(TypeAsset1::find()->all(), 'id_type_asset', 'type_asset');
?>
<div class="asset-master-index box box-success">
    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-body ">
        <?php echo $this->render('cari_tahun', ['model' => $searchModel]); ?>
        <?php
		$listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetMaster::tableName(),"", false);
		
		//CustomColumn
		$coltypeAsset = [
		        'label' => 'Type',
			'attribute' => 'typeAsset1.type_asset',
			'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
		];		
		$listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);
		
		$listCol1 = [
			'label' => AppVocabularySearch::getValueByKey('Jumlah Keterseediaan'),
		  ];
		$listColumnDynamic[] = $listCol1;
		$listCol2 = [
			'label' => AppVocabularySearch::getValueByKey('Jumlah Kebutuhan'),
		  ];
		$listColumnDynamic[] = $listCol2;
		$listCol3 = [
			'label' => AppVocabularySearch::getValueByKey('Selisih'),
		  ];
		$listColumnDynamic[] = $listCol3;
		$listCol4 = [
            'label' => AppVocabularySearch::getValueByKey('Ubah Kebutuhan'),
            'format' => 'raw',
            'value' => function($data) {
                return Html::a('Ubah Kebutuhan', [ '' ], ['class' => 'btn btn-sm btn-success ']);
            }
		  ];
		$listColumnDynamic[] = $listCol4;
		//echo var_export($listColumnDynamic, true); exit();
		
		echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Kebutuhan Asset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => $listColumnDynamic,
        ]); ?>

    </div>
	
	<?php /*
    <div class="box-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id_asset_master',
                'asset_name',
//                'id_asset_code',
                'asset_code',
                [
                    'attribute' => 'typeAsset1.type_asset',
                    'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                //'id_type_asset2',
                //'id_type_asset3',
                //'id_type_asset4',
                //'id_type_asset5',
                //'attribute1',
                //'attribute2',
                //'attribute3',
                //'attribute4',
                //'attribute5',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
	*/ ?>
</div>
