<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ItemProductComponentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Item Product Component';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body item-product-component-index">

        
        <p>
            <?= Html::a('Tambah Item Product Component', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'kode_item',
            'nama_item',
            'no_urut',
            'no_urut_kode',
            'barcode_item_kode',
            //'catatan',
            //'created_date',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
