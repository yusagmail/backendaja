<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\AssetMaster;

$this->title = $category->asset_name . ' - ' . AppVocabularySearch::getValueByKey('Asset Item');
$this->params['breadcrumbs'][] = ['label' => AppVocabularySearch::getValueByKey('Asset Item'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
?>
<div class="asset-item-category box box-success">
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
                    'value' => 'assetMaster.asset_name',
                    'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $dataList1, ['class' => 'form-control']),
                ],
                'number1',
                'number2',
                'number3',
                
                ['class' => 'yii\grid\ActionColumn'], // Add this for default CRUD actions (view, update, delete)
            ],
        ]); ?>
    </div>
</div>
