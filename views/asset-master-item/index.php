<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use kartik\select2\Select2; // Pastikan Anda menambahkan ini
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use backend\models\TypeAsset1;
use backend\models\TypeAsset2;
use backend\models\AppFieldConfigSearch;
use backend\models\AssetMaster;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL.' '. AppVocabularySearch::getValueByKey('Item By Master');
$this->params['breadcrumbs'][] = $this->title;

$dataList1 = ArrayHelper::map(TypeAsset1::find()->all(), 'id_type_asset', 'type_asset');
$dataList2 = ArrayHelper::map(TypeAsset2::find()->all(), 'id_type_asset', 'type_asset');

?>
<div class="asset-master-index box box-success">
    <div class="box-body">
        <?php 
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(AssetMaster::tableName());
        
        // CustomColumn
        $coltypeAsset1 = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset1'),
            'attribute' => 'typeAsset1.type_asset',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'id_type_asset1',
                'data' => $dataList1,
                'options' => ['placeholder' => '-- Pilih --'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset1', $coltypeAsset1);

        $coltypeAsset2 = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'id_type_asset2'),
            'attribute' => 'typeAsset2.type_asset',
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'id_type_asset2',
                'data' => $dataList2,
                'options' => ['placeholder' => '-- Pilih --'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_type_asset2', $coltypeAsset2);

        // Tambahkan kolom lainnya dan gunakan Select2 sebagai filter jika diperlukan
        // Misalnya:
        $colAssetName = [
            'attribute' => 'asset_name',
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetMaster::tableName(), 'asset_name'),
            'filter' => Select2::widget([
                'model' => $searchModel,
                'attribute' => 'asset_name',
                'data' => ArrayHelper::map(AssetMaster::find()->all(), 'asset_name', 'asset_name'),
                'options' => ['placeholder' => '-- Pilih --'],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]),
        ];
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'asset_name', $colAssetName);

        // Tambahkan kolom lainnya yang memerlukan filter Select2

        $add1 = [[
            'label' => 'Qty. Item',
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

        $add2 = [[
            'label' => 'View Item',
            'format' => 'raw',
            'value' => function ($data) {
                $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_asset_master);
                return Html::a(
                    '<i class="fa fa-fw fa-eye"></i> View Item',
                    ['view-stock', 'i' => $i],
                    ['class' => 'btn btn-success btn-xs']
                );
            }
        ]];  
        $indeksTerakhir = count($listColumnDynamic) - 1;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $add2);

        echo GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'striped' => true,
            'panel' => ['type' => 'primary', 'heading' => $this->title],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => $listColumnDynamic,
        ]); ?>
    </div>
</div>
