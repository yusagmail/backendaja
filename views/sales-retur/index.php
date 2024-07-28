<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesReturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Retur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sales-retur-index">

        
        <p>
            <?= Html::a('Tambah Sales Retur', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tanggal_retur',
            'alasan_retur',
            'catatan_kondisi_barang',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
