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
                'value' => function ($data) {
                    $model = \backend\models\AssetItemMapping::find()
                        ->where(['id_asset_item' => $data->id_asset_item])
                        ->one();
                    if($model != null){
                        if(isset($model->point)){
                            return $model->point->name;
                        }
                    }
                    return "--";
                }
            ],
            [
                'label' => 'Sensor Device',
                'format' => 'raw',
                //'value' => function ($data) use ($ip) {
                'value' => function ($data) {
                    $model = \backend\models\AssetItemMapping::find()
                        ->where(['id_asset_item' => $data->id_asset_item])
                        ->one();
                    if($model != null){
                        if(isset($model->sensor)){
                            return $model->sensor->sensor_name;
                        }
                    }
                    return "--";
                }
            ],
            /*
            'picture3',
            'id_asset_received',
            'id_asset_item_location',
            */
        ],
    ]) ?>


