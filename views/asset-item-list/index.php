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
use backend\models\AssetItem;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(TypeAsset1::find()->all(), 'id_type_asset', 'type_asset');
$dataList2 = ['' => '-- Pilih --'] + ArrayHelper::map(TypeAsset2::find()->all(), 'id_type_asset', 'type_asset');
?>
<div class="asset-master-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE.' '.AppVocabularySearch::getValueByKey('Single').' '. AppVocabularySearch::getValueByKey('Stock'), ['asset-item-list/create-single', 'i'=>$i], ['class' => 'btn btn-success']) ?>

            <?php /*
            <?= Html::a(CommonActionLabelEnum::CREATE.' '.AppVocabularySearch::getValueByKey('Multiple').' '. AppVocabularySearch::getValueByKey('Stock'), ['create'], ['class' => 'btn btn-info']) ?>
            */ ?>
        </p>
    </div>  
    
   
    <div class="box-body">
        <?php 
        $listColumnDynamic = AppFieldConfigSearch::getListGridView(\backend\models\AssetItem::tableName(),"",false);

        $dataList1 = ['' => '-- Pilih --'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
        $coltypeAsset = [
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(AssetItem::tableName(), 'id_asset_master'),
            'attribute' => 'assetMaster.asset_name',
            'filter'=>Html::activeDropDownList($searchModel, 'id_asset_master', $dataList1, ['class' => 'form-control']),
        ];      
        $listColumnDynamic = AppFieldConfigSearch::replaceListGridViewItem($listColumnDynamic, 'id_asset_master', $coltypeAsset);
        
        //echo var_export($listColumnDynamic, true); exit();
        $add1 = [[
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'id_location'),
            'format' => 'raw',
            //'value' => function ($data) use ($ip) {
            'value' => function ($data) {
                $model = \backend\models\AssetItemLocationUnit::find()
                    ->where(['id_asset_item' => $data->id_asset_item])
                    ->one();
                if($model != null){
                    if(isset($model->location)){
                        return $model->location->location_name;
                    }
                }
                return "--";
            }
        ]];  
        $indeksTerakhir = count($listColumnDynamic) ;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $add1);

        $add1 = [[
            'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'unit_name'),
            'format' => 'raw',
            //'value' => function ($data) use ($ip) {
            'value' => function ($data) {
                $model = \backend\models\AssetItemLocationUnit::find()
                    ->where(['id_asset_item' => $data->id_asset_item])
                    ->one();
                if($model != null){
                    if(isset($model->locationUnit)){
                        return $model->locationUnit->unit_name;
                    }
                }
                return "--";
            }
        ]];  
        $indeksTerakhir = count($listColumnDynamic) ;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $add1);

        $id = 10; $t=0;
        $addbutton2 = [
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'header' => 'Aksi',
                    'buttons' => [
                        'view' => function ($url,$model) use ($i, $t)  {
                                $idi = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_asset_item);
                                $button =  Html::a(
                                    '<i class="fa fa-fw fa-eye"></i>',
                                    ['view-stock', 'i' => $i,'t' => $t, 'action'=>'view', 'idi'=>$idi],
                                    ['class' => '']
                                );

                                return $button;

                        },
                        'update' => function ($url,$model) use ($i, $t)  {
                                $idi = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_asset_item);
                                $button =  Html::a(
                                    '<i class="glyphicon glyphicon-pencil"></i>',
                                    ['view-stock', 'i' => $i,'t' => $t, 'action'=>'update', 'idi'=>$idi],
                                    ['class' => '']
                                );

                                return $button;

                        },
                        'delete' => function ($url,$model) use ($i, $t) {
                            $idi = \common\utils\EncryptionDB::encryptor('encrypt',$model->id_asset_item);
                            $url_delete = yii\helpers\Url::toRoute(['view-stock', 'i' => $i,'t' => $t, 'action'=>'delete', 'idi'=>$idi]);
                            return Html::a('', $url_delete,
                              [
                                 'data' => [
                                     'method' => 'post',
                                      // use it if you want to confirm the action
                                      'confirm' => 'Anda yakin mau menghapus?',
                                  ],
                                  'class' => 'glyphicon glyphicon-trash'
                               ]
                             );
                        },
                    ],
                 ],   
        ];
        $indeksTerakhir = count($listColumnDynamic) ;
        array_splice($listColumnDynamic, $indeksTerakhir, 0, $addbutton2);
        
        echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
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
