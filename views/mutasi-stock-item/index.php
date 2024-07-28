<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MutasiStockItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutasi Stock Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mutasi-stock-item-index">

        
        <p>
            <?= Html::a('Tambah Mutasi Stock Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'keterangan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
