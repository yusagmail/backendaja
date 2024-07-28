<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PembelianMaterialSupportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembelian Material Support';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body pembelian-material-support-index">

        
        <p>
            <?= Html::a('Tambah Pembelian Material Support', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tanggal_pembelian',
                [
                    'attribute' => 'id_material_support',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialSupport)) {
                            return $data->materialSupport->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>false
                ],
                'nomor_faktur',
                'jumlah',
                'harga_satuan',
                'keterangan',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
