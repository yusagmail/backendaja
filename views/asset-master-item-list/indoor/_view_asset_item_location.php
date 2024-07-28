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
            //'id_status_received',
            [
                'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'id_location'),
                'format' => 'raw',
                //'value' => function ($data) use ($ip) {
                'value' => function ($model) {
                    if(isset($model->location)){
                        return $model->location->location_name;
                    }else{
                        return '--';
                    }
                }
            ],
            [
                'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'unit_name'),
                'format' => 'raw',
                //'value' => function ($data) use ($ip) {
                'value' => function ($model) {
                    if(isset($model->locationUnit)){
                        return $model->locationUnit->unit_name;
                    }else{
                        return '--';
                    }
                }
            ],
            'keterangan',
            /*
            'picture3',
            'id_asset_received',
            'id_asset_item_location',
            */
        ],
    ]) ?>


