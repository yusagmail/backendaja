<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BankPembayaranSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bank Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body bank-pembayaran-index">

        
        <p>
            <?= Html::a('Tambah Bank Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'nama_bank',
            'nama_bank_short',
            'nomor_rekening',
            'atas_nama',
            'kode',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
