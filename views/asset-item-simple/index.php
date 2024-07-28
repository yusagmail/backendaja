<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\AssetMaster;

$this->title = CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey('Asset Item');
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');

?>
<div class="asset-item-index box box-success">
    <div class="box-header with-border">
        <p>
            
            <?= Html::a(CommonActionLabelEnum::CREATE . ' ' . AppVocabularySearch::getValueByKey('Asset Item'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body">
        <?php
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'striped' => true,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'], // Add this if you want a serial number column
                
                // Define your columns here
                'id_asset_item',
                [
                    'attribute' => 'id_asset_master',
                    'value' => function ($model) use ($assetCounts) {
                        return $model->assetMaster->asset_name . ' (' . ($assetCounts[$model->id_asset_master]['count'] ?? 0) . ')';
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $dataList1, ['class' => 'form-control']),
                ],
                'number1',
                'number2',
                'number3',
                
                [
                    'header' => 'Stock',
                    'content' => function ($model) use ($assetCounts) {
                        $count = $assetCounts[$model->id_asset_master]['count'] ?? 0;
                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Stock ' . $count,
                            ['category', 'id' => $model->id_asset_master],
                            ['class' => 'btn btn-success btn-xs', 'title' => 'Show assets by category']
                        );
                    },
                ],
                
                [
                    'class' => 'yii\grid\ActionColumn', // Kolom aksi default (view, update, delete)
                    'template' => '{view} {update} {delete}',
                ],
            ],
        ]); ?>
    </div>
</div>
