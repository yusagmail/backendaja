<?php

use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */

$fieldBuktiSurvey = "keterangan2";
?>

<?= DetailView::widget([
	'model' => $model,
	'attributes' => [
//            'id_location_unit',
		//'keterangan2',
		//'keterangan3',
		[
                'label'=>'Bukti Survey',
                'format' => 'raw',
                'value'=>function ($model) use ( $c, $fieldBuktiSurvey) {
					//$i = EncryptionDB::staticEncryptor("encrypt",$model->id_location_unit);
					if($model->$fieldBuktiSurvey != ""){
						$url = '../..' . '/web/' ."uploads/".$model->$fieldBuktiSurvey;
						return Html::a('<i class="fa fa-download"></i> Download File / View File', $url, 
							['class' => 'btn btn-warning btn-xs']
						);
					}else{
						return "-- (Belum Ada Bukti)";
					}
                },
        ],
	],
]) ?>

<?php
if(!$status_read_only){
	$title = "Upload Bukti Survey";
	$lblBtn = "btn-success";
	if($model->$fieldBuktiSurvey != ""){
		$title = "Upload Ulang Bukti Survey";
		$lblBtn = "btn-danger";
	}
	$url = Url::to(['upload-file-attach1','c'=>$c]);
	echo Html::a('<i class="fa fa-plus"></i> '.$title, 
			$url,
			['class'=> 'btn btn-xs '.$lblBtn,
			]);
}
?>
