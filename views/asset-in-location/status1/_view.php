<?php

use backend\models\AppVocabularySearch;
use backend\models\AppFieldConfigSearch;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $model backend\models\LocationUnit */


?>


<div class="row">
	<div class="col-md-4 col-sm-6 col-xs-12">
	 <?php
	if(isset($model->status1)){
		$status =  $model->status1->mst_status;
		$colorStatus = "yellow";
		switch($model->id_mst_status1){
			case 1: 
				$colorStatus= "bg-green"; break; //SUDAH DIBEBASKAN
			case 2:
				$colorStatus = "bg-red"; break;
		}
	?>
	 <div class="info-box <?= $colorStatus ?>">
		<span class="info-box-icon"><i class="ion ion-ios-pricetag-outline"></i></span>

		<div class="info-box-content">
		  <span class="info-box-text">STATUS PEMBEBASAN</span>
		  <span class="info-box-number"><?= $status ?></span>

		  <div class="progress">
			<div class="progress-bar" style="width: 100%"></div>
		  </div>
		  <span class="progress-description">
				
			  </span>
		</div>
		<!-- /.info-box-content -->
	  </div>
	<?php
	}else{
		echo '
			<div class="callout callout-warning">
                <h4>Status Pembebasan</h4>

                <p>Satus Pembebeasan Belum diset. Silakan ubah terlebih dahulu</p>
              </div>
		';
	}
	?>
	  		<?php
	  		if(!$status_read_only){
				$title = "Ubah Status";
				$lblBtn = "btn-success";

				$url = Url::to(['change-status1','c'=>$c]);
				echo Html::a('<i class="fa fa-edit"></i> '.$title, 
						$url,
						['class'=> 'btn btn-xs '.$lblBtn,
						]);
			}
			?>
	</div>
	<div class="col-md-8 col-sm-6 col-xs-12">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				/*
				[
					'label'=>'Status Pembebasan',
					'format' => 'raw',
					'value'=>function ($model) use ( $c) {
						if(isset($model->status1)){
							return $model->status1->mst_status;
						}else{
							return "-- (Status Belum Diset)";
						}
					},
				],
				*/
				[
					'label'=>'Terakhir Diubah Oleh',
					'format' => 'raw',
					'value'=>function ($model) use ( $c) {
						if(isset($model->status1changeuser)){
							return $model->status1changeuser->full_name;
						}else{
							return "--";
						}
					},
				],
				[
					'label'=>'Waktu Perubahan Terakhir',
					'format' => 'raw',
					'value'=>function ($model) use ( $c) {
						return $model->status1_changed_time;
					},
				],
				//'id_mst_status1',
				//'status1_changed_user',
				//'status1_changed_time',
			],
		]) ?>
	</div>
</div>

