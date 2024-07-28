<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use backend\models\TypeAssetItem1;
use backend\models\TypeAssetItem2;
use backend\models\Kabupaten;
use backend\models\Kecamatan;
use backend\models\AssetMaster;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use yii\web\UploadedFile;
use backend\models\AssetItem;
use yii\base\DynamicModel;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Data Aset');
$this->params['breadcrumbs'][] = $this->title;

$datalistAsset = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
$datalistLocation = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(\backend\models\Location::find()->all(), 'id_location', 'location_name');
$datalistLocationUnit = ['' => CommonActionLabelEnum::CHOOSE_PROMPT] + ArrayHelper::map(\backend\models\LocationUnit::find()->all(), 'id_location_unit', function($model) {
    return $model['number_reg'] . " - " . $model['unit_name'];
});
?>
<div class="asset-item-index box box-primary">

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Data Aset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn',
                    'contentOptions' => ['style' => 'vertical-align: top;', 'class' => 'text-center'],
                ],
                [
                    'attribute' => 'assetMaster.asset_name',
                    'contentOptions' => ['style' => 'width:350px; min-width:300px;'],
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'id_asset_master',
                        'data' => $datalistAsset,
                        'options' => ['placeholder' => CommonActionLabelEnum::CHOOSE_PROMPT],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]),
                ],
                'number1',
                [
                    'attribute' => 'location.location_name',
                    'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'id_location'),
                    'format' => 'raw',
                    'value' => function ($data) {
                        $model = \backend\models\AssetItemLocationUnit::find()
                            ->where(['id_asset_item' => $data->id_asset_item])
                            ->one();
                        if ($model != null && isset($model->location)) {
                            return $model->location->location_name;
                        }
                        return "--";
                    },
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'id_location',
                        'data' => $datalistLocation,
                        'options' => ['placeholder' => CommonActionLabelEnum::CHOOSE_PROMPT],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]),
                ],
                [
                    'attribute' => 'locationUnit.unit_name',
                    'label' => \backend\models\AppFieldConfigSearch::getLabelName(\backend\models\LocationUnit::tableName(), 'unit_name'),
                    'format' => 'raw',
                    'value' => function ($data) {
                        $model = \backend\models\AssetItemLocationUnit::find()
                            ->where(['id_asset_item' => $data->id_asset_item])
                            ->one();
                        if ($model != null && isset($model->locationUnit)) {
                            return $model->locationUnit->number_reg . ". " . $model->locationUnit->unit_name;
                        }
                        return "--";
                    },
                    'filter' => Select2::widget([
                        'model' => $searchModel,
                        'attribute' => 'id_location_unit',
                        'data' => $datalistLocationUnit,
                        'options' => ['placeholder' => CommonActionLabelEnum::CHOOSE_PROMPT],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]),
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'header' => 'Aksi',
                    'buttons' => [
                        'view' => function ($url, $model, $key) {
                            $idi = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
                            $i = EncryptionDB::encryptor('encrypt', $model->id_asset_master);
                            return Html::a('<i class="fa fa-fw fa-eye"></i>', ['view-stock', 'i' => $i, 'action' => 'view', 'idi' => $idi], ['class' => '']);
                        },
                        'update' => function ($url, $model, $key) {
                            $idi = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
                            $i = EncryptionDB::encryptor('encrypt', $model->id_asset_master);
                            return Html::a('<i class="glyphicon glyphicon-pencil"></i>', ['view-stock', 'i' => $i, 'action' => 'update', 'idi' => $idi], ['class' => '']);
                        },
                        'delete' => function ($url, $model, $key) {
                            $idi = EncryptionDB::encryptor('encrypt', $model->id_asset_item);
                            $i = EncryptionDB::encryptor('encrypt', $model->id_asset_master);
                            $url_delete = Url::toRoute(['view-stock', 'i' => $i, 'action' => 'delete', 'idi' => $idi]);
                            return Html::a('', $url_delete, [
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Anda yakin mau menghapus?',
                                ],
                                'class' => 'glyphicon glyphicon-trash'
                            ]);
                        },
                    ],
                ],
            ],
        ]); ?>
    </div>
</div>
