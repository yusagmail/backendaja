<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Reservation';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-item-reservation-index">

        
        <p>
            <?= Html::a('Tambah Asset Item Reservation', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'event_date',
            'start_time',
            'end_time',
            'event_name',
            'description',
            //'pic',
            //'reservation_time',
            //'reservation_name',
            //'reservation_ip_address',
            //'reservation_phone',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
