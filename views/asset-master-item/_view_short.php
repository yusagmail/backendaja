<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppFieldConfigSearch;
use backend\models\AppVocabularySearch;
use backend\models\AssetMaster;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMaster */

\yii\web\YiiAsset::register($this);
?>
<div class="asset-master-view box box-success">
    <div class="box-header with-border">

        <?php

        echo DetailView::widget([
            'model' => $model,
            'attributes' => [
//              'id_asset_master',
                'asset_name',
                'asset_code',
                [
                    'attribute' => 'id_type_asset1',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
                    'value' => function ($data) {
                        if (isset($data->typeAsset1)) {
                            return $data->typeAsset1->type_asset;
                        } else {
                            return "--";
                        }
                    },
                ],
                [
                    'attribute' => 'id_type_asset2',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset2'),
                    'value' => function ($data) {
                        if (isset($data->typeAsset2)) {
                            return $data->typeAsset2->type_asset;
                        } else {
                            return "--";
                        }
                    },
                    //'visible' => true,
                    'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'id_type_asset2'),
                    //filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'attribute1',
                    'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'attribute1'),
                ],
                [
                    'attribute' => 'attribute2',
                    'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'attribute2'),
                ],
                [
                    'attribute' => 'attribute3',
                    'visible' =>AppFieldConfigSearch::getVisibleLabelName($model::tableName(),'attribute3'),
                ],
                /*
                'attribute1',
                'attribute2',
                'attribute3',
                */
                /*
                [
                    'attribute' => 'asset_name',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'asset_name'),
                    'value' => function ($data) {
                        return $data->asset_name;
                    },
                    
                ],
                
                [
                    'attribute' => 'asset_code',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'asset_code'),
                    'value' => function ($data) {
                        return $data->asset_code;
                    },
                    
                ],
                [
                    'attribute' => 'id_type_asset1',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
                    'value' => function ($data) {
                        if (isset($data->typeAsset1)) {
                            return $data->typeAsset1->type_asset;
                        } else {
                            return "--";
                        }
                    },
                ],
                [
                    'attribute' => 'attribute1',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'attribute1'),
                    'value' => function ($data) {
                        return $data->attribute1;
                    },
                    //filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'attribute2',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'attribute2'),
                    'value' => function ($data) {
                        return $data->attribute1;
                    },
                    //filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                */
            ],
        ])

        ?>


        <?php
        /*
        $listColumnDynamic = AppFieldConfigSearch::getListDetailView(AssetMaster::tableName());

        //CustomColumn
        $coltypeAsset = [
            'attribute' => 'typeAsset1.type_asset',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);

        $coltypeAsset2 = [
            'attribute' => 'typeAsset2.type_asset',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset2'),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset2', $coltypeAsset2);

        echo DetailView::widget([
            'model' => $model,
            'attributes' => $listColumnDynamic,
        ]) 
        */ 
        ?>
    </div>
</div>
