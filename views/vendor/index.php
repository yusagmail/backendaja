<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\TypeOfVendor;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\VendorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vendors';
$this->params['breadcrumbs'][] = $this->title;

//$datalist = ['' => 'Choose'] + ArrayHelper::map(TypeOfVendor::find()->all(), 'id_type_of_vendor', 'type_of_Vendor');
?>
<div class="vendor-index box box-primary">
	<?php /*
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
	*/ ?>
	<div class="box-header with-border">
    <p>
        <?= Html::a('Tambah Vendor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	</div>
	
	<div class="box-body table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_vendor',
            'name',
            'company',
            'address',
            'city',
            //'state',
            //'zip',
            //'country',
            //'email_address:email',
            //'phone_number',
            //'id_type_of_vendor',
            [
                'label' => 'Type Vendor',
                'attribute'=>'typeOfVendor.type_of_vendor',
                //'filter'=>Html::activeDropDownList($searchModel, 'id_type_of_vendor', $datalist, ['class' => 'form-control']),
            ],
            //'created_date',
            //'created_time',
            //'created_ip_address',
            //'created_id_user',
            //'id_user',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	</div>
</div>
