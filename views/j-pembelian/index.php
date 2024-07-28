<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JPembelianSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'J Pembelian';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body jpembelian-index">

        
        <p>
            <?= Html::a('Tambah J Pembelian', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'jumlah',
            'total_biaya',
            'no_bukti',
            'tanggal_pembelian',
            'bulan',
            //'tahun',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
