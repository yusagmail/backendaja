<?php

use common\utils\EncryptionDB;
use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use backend\models\AssetItem_Generic;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\Kelurahan;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = AppVocabularySearch::getValueByKey('Reminder Aset - Habis Umur Ekonomis');
$this->params['breadcrumbs'][] = $this->title;


$datalist = ['' => CommonActionLabelEnum::CHOOSE, '1' => CommonActionLabelEnum::ACTIVE, '0' => CommonActionLabelEnum::IN_ACTIVE]
?>

NB: Reminder Aset yang akan habis usianya berdasarkan nilai ekonomisnya
Bisa diseting mau diremind dalam satuan tahun / satuan bulan
<br><Br>
Nanti list itemnya difilter lagi
<div class="asset-item-index box box-primary">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <div class="box-body table-responsive">
        <?php

        $listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetItem_Generic::tableName(),"", false);
		
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
		
		$listColumnDynamic[] = [
			'label' => AppVocabularySearch::getValueByKey('Tanggal Pembelian'),
		  ];
		$listColumnDynamic[] = [
			'label' => AppVocabularySearch::getValueByKey('Umur Ekonomis'),
		  ]; 
		$listColumnDynamic[] = [
			'label' => AppVocabularySearch::getValueByKey('Tanggal Berakhir'),
		  ];
		$listColumnDynamic[] = [
			'label' => AppVocabularySearch::getValueByKey('Sisa Berapa Hari?'),
		  ];
		$listColumnDynamic[] = [
			'label' => AppVocabularySearch::getValueByKey('Kondisi'),
		  ];
		
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' =>  $listColumnDynamic
        ]); ?>
    </div>
</div>
