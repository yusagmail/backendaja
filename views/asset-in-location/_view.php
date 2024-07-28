<?php

use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */


?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id_location_unit',
            //'location.location_name',
			[
				'label'=>AppFieldConfigSearch::getLabelName("location","location_name"),
				'value'=>function ($data) {
					if(isset($data->location)){
						return $data->location->location_name;
					}else{
						return "--";
					}
				}
			],
            //'owner.name',
			[
				'label'=>AppFieldConfigSearch::getLabelName("owner","name"),
				'value'=>function ($data) {
					if(isset($data->owner)){
						return $data->owner->name;
					}else{
						return "--";
					}
				}
			],
            //'label1',
			[
				'label'=>AppFieldConfigSearch::getLabelName("location_unit","label1"),
				'attribute'=>'label1',
			],
            //'label2',
            //'label3',
            //'keterangan1',
			[
				'label'=>AppFieldConfigSearch::getLabelName("location_unit","keterangan1"),
				'attribute'=>'keterangan1',
			],
            //'keterangan2',
            //'keterangan3',
        ],
    ]) ?>
