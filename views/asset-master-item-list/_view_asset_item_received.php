<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItem */

\yii\web\YiiAsset::register($this);
?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id_asset_item',
            //'id_asset_master',
            'attribute1',
            
            'received_date',
            'price_received',
            //'id_status_received',
            [
                'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\AssetReceived::tableName(), 'id_status_received'),
                'format' => 'raw',
                //'value' => function ($data) use ($ip) {
                'value' => function ($model) {
                    if(isset($model->statusReceived)){
                        return $model->statusReceived->status_received;
                    }else{
                        return '--';
                    }
                }
            ]
            /*
            'picture3',
            'id_asset_received',
            'id_asset_item_location',
            */
        ],
    ]) ?>


