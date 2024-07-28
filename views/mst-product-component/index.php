<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MstProductComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Master Komponen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mst-product-component-index">

        
        <p>
            <?= Html::a('Tambah Komponen', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'nama',
                'kode',
                
                //'no_urut',
                //'no_urut_kode',
                //'barcode_kode',
                'deskripsi',
                //'is_finish_product',
                [
                    'attribute' => 'is_finish_product',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusFinalProduk();
                    },

                ],
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
