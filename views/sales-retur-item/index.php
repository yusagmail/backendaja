<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesReturItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Retur Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sales-retur-item-index">

        
        <p>
            <?= Html::a('Tambah Sales Retur Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'retur_created_date',
            'retur_created_ip_address',
            'yard',
            'kode',
            'year',
            //'no_urut',
            //'no_urut_kode',
            //'no_splitting',
            //'barcode_kode',
            //'deskripsi',
            //'is_packing',
            //'is_join_packing',
            //'join_info',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
