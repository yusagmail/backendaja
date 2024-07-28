<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PickingListItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Picking List Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body picking-list-item-index">

        
        <p>
            <?= Html::a('Tambah Picking List Item', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'item_id',
            'item_name',
            'size',
            'location',
            'qty',
            //'unit',
            //'created_date',
            //'created_user_id',
            //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
