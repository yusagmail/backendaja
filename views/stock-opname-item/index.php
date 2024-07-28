<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockOpnameItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Opname Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body stock-opname-item-index">

        
        <p>
            <?= Html::a('Tambah Stock Opname Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'redundat_barcode_code',
            'keterangan',
            'entry_time',
            'created_user_id',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
