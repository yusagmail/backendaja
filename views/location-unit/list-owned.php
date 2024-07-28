<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use backend\models\Location;
use yii\helpers\ArrayHelper;
use common\utils\EncryptionDB;
use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\LocationUnitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$baseName = AppVocabularySearch::getValueByKey('List Owned');
$this->title = $baseName;
$this->params['breadcrumbs'][] = $this->title;
$location_name = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Location::find()->all(), 'id_location', 'location_name');
$address = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(Location::find()->all(), 'id_location', 'address');

?>
<?php echo $this->render('_search_adv', ['model' => $searchModel]); ?>

<div class="location-unit-index box box-success">
    <div class="box-body">
    <?=
    \kartik\grid\GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        //'showPageSummary' => true,
        'pjax' => true,
        'striped' => true,
        'hover' => true,
        'responsiveWrap' => false,
        'panel' => ['type' => 'primary', 'heading' => $baseName],
        'toggleDataContainer' => ['class' => 'btn-group mr-2'],
        'columns' => [
            [
                'header' => 'No',
                'class' => 'yii\grid\SerialColumn'
            ],

//            'id_location_unit',
            [
                'attribute' => 'locationName',
                'value' => function($model){
                    //return $model->location->location_name;
                    if (isset($model->location->location_name)) {
                        return $model->location->location_name;
                    } else {
                        return "--";
                    }
                },
            ],
            'owner.name',
			//'label1',
			[
				'header' => 'Nomor Registrasi',
				'content'=>function ($model) {
					return $model->label1;
				}
			],
            [
	            'attribute' => 'locationAddress',
	            'value' => function($model){
	            	//return $model->location->address;
	            	if (isset($model->location->address)) {
                        return $model->location->address;
                    } else {
                        return "--";
                    }
	            },
            ],
			/*
			[
				'label' => 'Propinsi',
				'attribute' => 'id_propinsi',
				'content'=>function ($model) {
					if(isset($model->location->propinsi)){
						return $model->location->propinsi->nama_propinsi;
					}else{
						return "--";
					}
				}
			],
			*/
            
            //'label2',
            [
                'attribute' => 'id_mst_status1',
                'label' => '<abbr title="Status Action">Status Pembebasan</abbr>',
                'encodeLabel' => false,
                'headerOptions' => ['style'=>'text-align:center; width: 150px; '],
                'contentOptions' => function ($model, $key, $index){
                    return [
                        'style' => 'width: 20%;text-color : white; background-color:'
                            .(app\common\labeling\OwnedLabel::getColorKode($model->id_mst_status1)),
//                            . (app\common\labeling\OwnedLabel::getColorApprovalKode($model->id_mst_status1)),
                        'class' => 'text-center text-gray',
                    ];
                },
                'value' => function ($model, $key, $index) {

                    return app\common\labeling\OwnedLabel::getOwnedKode($model->id_mst_status1);
                }
            ],

            [
               'label'=>'Detail',
               'format' => 'raw',
               'value'=>function ($data) {

                    $ic = EncryptionDB::staticEncryptor('encrypt', $data->id_location_unit);
                    $url_detail = Url::toRoute(['/asset-in-location/view-only-detail', 'c' => $ic]);
                    //$link = Html::a('View / Update', $url_detail,
                    //        ['class' => 'btn btn-xs btn-success']);
                   return Html::a('Detail', $url_detail, ['class' => 'btn btn-sm btn-success']);
                },
            ],
            //'label3',
            //'keterangan1',
            //'keterangan2',
            //'keterangan3',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
