<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\TypeAsset1;
use backend\models\TypeAsset2;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMaster;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Asset Master');
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(TypeAsset1::find()->all(), 'id_type_asset', 'type_asset');
$dataList2 = ['' => '-- Pilih --'] + ArrayHelper::map(TypeAsset2::find()->all(), 'id_type_asset', 'type_asset');
?>
<div class="asset-master-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '. AppVocabularySearch::getValueByKey('Asset Master'), ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::a(CommonActionLabelEnum::CREATE . " " . AppVocabularySearch::getValueByKey('Type Asset 1'), Url::toRoute(['type-asset1/index']), ['class' => 'btn btn-success']) ?>
        </p>
    </div>  
    
    <div class="box-body">
        <?php 
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetMaster::tableName());
        
        //CustomColumn
        $coltypeAsset = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
            'attribute' => 'typeAsset1.type_asset',
            'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset);

        $coltypeAsset = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset2'),
            'attribute' => 'typeAsset2.type_asset',
            'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset2', $dataList2, ['class' => 'form-control']),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset2', $coltypeAsset);

        $add1 = [[
            'label' => 'Stock',
            'value' => function ($data) {
                
                $stock = \backend\models\AssetItem::find()
                    ->where(['id_asset_master' => $data->id_asset_master])
                    ->count();

                return $stock;
            },
            'format' => 'raw',
        ]];  
        $indeksTerakhir = count($listColumnDynamic) - 1;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $add1);

        $add1 = [[
            'label' => 'Lihat Stock',
            'format' => 'raw',
            //'value' => function ($data) use ($ip) {
            'value' => function ($data) {
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_asset_master);

                return Html::a(
                    '<i class="fa fa-fw fa-eye"></i> Stock',
                    ['view-stock', 'i' => $i],
                    ['class' => 'btn btn-success btn-xs']
                );
            }
        ]];  
        $indeksTerakhir = count($listColumnDynamic) - 1;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $add1);

        
        //echo var_export($listColumnDynamic, true); exit();
        
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            //'pjax' => true,
            'striped' => true,
            //'hover' => true,
            //'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => $listColumnDynamic,
        ]); ?>

    </div>

    <?php /*
    <div class="box-body table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id_asset_master',
                //'asset_name',
                [
                    'attribute' => 'asset_name',
                    'label' =>  \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'asset_name'),
                    'value' => function ($data) {
                        return $data->asset_name;
                    },
                    
                ],
//                'id_asset_code',
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
                    'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                //'id_type_asset2',
                //'id_type_asset3',
                //'id_type_asset4',
                //'id_type_asset5',
                //'attribute1',
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
                //'attribute2',
                'attribute3',
                'attribute4',
                //'attribute5',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
    */ ?>

</div>
