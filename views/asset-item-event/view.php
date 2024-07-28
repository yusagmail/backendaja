<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemEvent */

//$this->title = $model->id_asset_item_event;
$this->title = 'Detail '.'Asset Item Event';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Event', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-item-event-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_event], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_event], [
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
            'pic_phone',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
