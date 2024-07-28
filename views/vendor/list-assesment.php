<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\User;
use backend\models\TypeOfSupplier;
use backend\models\SupplierAssesment;
use backend\models\SaOffline;
use common\utils\EncryptionDB;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Asesmen - Supplier';
$this->params['breadcrumbs'][] = $this->title;

$datalist = ['' => 'Choose'] + ArrayHelper::map(User::find()->all(), 'id', 'full_name');
$datalistTypeOfSupplier = ['' => 'Choose'] + ArrayHelper::map(TypeOfSupplier::find()->all(), 'id_type_of_supplier', 'type_of_supplier')
?>
<div class="supplier-index box box-primary">
	<?php /*
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	*/ ?>
	
	<div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_supplier',
            'name',
            'company',
            //'address',
            'city',
			[
                'label' => 'Type Supplier',
                'attribute'=>'typeOfSupplier.type_of_supplier',
                'filter'=>Html::activeDropDownList($searchModel, 'id_type_of_supplier', $datalistTypeOfSupplier, ['class' => 'form-control']),
            ],
            //'state',
            //'zip',
            //'country',
            //'email_address:email',
            //'phone_number',
            //'id_type_of_supplier',
            //'created_date',
            //'created_time',
            //'created_ip_address',
            //'created_id_user',
//            'id_user',
			[
                'label' => 'Online Assessment',
//                'attribute'=>'step_progress',
				'format'=>'raw',
                'value'=>
                    function ($model) {
						$sa = SupplierAssesment::find()
						->where(['id_supplier' => $model->id_supplier])
						->one();
						if($sa != null){
							return "SUDAH ASESMEN <br> [".$sa->assesment_date."]";
						}else{
							return "--";
						}
					},
				 'contentOptions' => function ($model, $key, $index, $column) {
                    $sa = SupplierAssesment::find()
						->where(['id_supplier' => $model->id_supplier])
						->one();
					if($sa != null){
                        return ['style' => 'text-color : white; background-color:green', 'class' => 'text-center text-black'];
                    }else {
                        //return ['style' => 'text-color : white; background-color:yellow', 'class' => 'text-center text-black'];
						return [];
                    }
				 }
            ],
			
			[
                'label' => 'Offline Assessment',
//                'attribute'=>'step_progress',
                'value'=>
                    function ($model) {
						$sa = SaOffline::find()
						->where(['id_supplier' => $model->id_supplier])
						->one();
						if($sa != null){
							return "SUDAH UPLOAD FILE";
						}else{
							return "--";
						}
					},
				'contentOptions' => function ($model, $key, $index, $column) {
                    $sa = SaOffline::find()
						->where(['id_supplier' => $model->id_supplier])
						->one();
					if($sa != null){
                        return ['style' => 'text-color : white; background-color:green', 'class' => 'text-center text-black'];
                    }else {
                        return [];
                    }
				 }
            ],
			['class' => 'yii\grid\ActionColumn',
			'template' => ' {open}',
			'header' => 'Masukkan Data Asesmen',
			'buttons' => [
				'open' => function ($url, $model) {
					$is = EncryptionDB::encryptor('encrypt',$model->id_supplier);
					$url = Url::toRoute(['supplier-assesment/online', 'is'=>$is]);
						return Html::a('<button type="button" class="btn btn-warning btn-sm" onclick="return confirm(\'Anda dalam mode untuk entry manual asesmen mewakili pemasok! Silakan pilih OK jika ingin melanjutkan!\')">ENTRY ASESMEN</button>', $url, [
							'title' => Yii::t('app', 'Open Lock'),
						]);
				},
			]],
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	</div>
</div>
