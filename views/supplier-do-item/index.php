<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierDoItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Supplier Do Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body supplier-do-item-index">

        
        <p>
            <?= Html::a('Tambah Supplier Do Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'varian',
            'qty',
            'unit_price',
            'total_price',
            'keterangan',
            //'created_date',
            //'created_user_id',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
