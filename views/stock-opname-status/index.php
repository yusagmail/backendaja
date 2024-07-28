<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockOpnameStatusSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Opname Status';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body stock-opname-status-index">

        
        <p>
            <?= Html::a('Tambah Stock Opname Status', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'status',
            'tgl_dibuat',
            'waktu_mulai',
            'waktu_terakhir',
            'created_date',
            //'created_user_id',
            //'created_ip_address',
            //'modified_date',
            //'modified_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
