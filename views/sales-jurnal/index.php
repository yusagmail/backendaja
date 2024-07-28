<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesJurnalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Jurnal';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sales-jurnal-index">

        
        <p>
            <?= Html::a('Tambah Sales Jurnal', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'type',
            'tanggal',
            'debit',
            'kredit',
            'keterangan',
            //'bayar_cara',
            //'bayar_bukti',
            //'jumlah_bayar',
            //'created_date',
            //'created_user_id',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
