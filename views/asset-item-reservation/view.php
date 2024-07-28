<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemReservation */

//$this->title = $model->id_asset_item_reservation;
$this->title = 'Detail '.'Asset Item Reservation';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Reservation', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-item-reservation-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_reservation], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_reservation], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'event_date',
            'start_time',
            'end_time',
            'event_name',
            'description',
            'pic',
            'reservation_time',
            'reservation_name',
            'reservation_ip_address',
            'reservation_phone',
            ],
        ]) ?>

    </div>
</div>
