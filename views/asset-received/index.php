<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use backend\models\AssetMaster;
use backend\models\MstStatusReceived;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey('Penerimaan Aset');;
$this->params['breadcrumbs'][] = $this->title;

$dataAssetMaster = ['' => 'Choose'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
$dataStatusReceived = ['' => 'Choose'] + ArrayHelper::map(MstStatusReceived::find()->all(), 'id_status_received', 'status_received');
?>
<style>
    .sort-numerical {
        text-align: left;
    }
</style>
<div class="asset-received-index box box-success">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body">
        <?php Pjax::begin(['id' => 'pjax-grid-view']); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Penerimaan Aset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],

//            'id_asset_received',
                [
                    'attribute' => 'assetMaster.asset_name',
                    'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $dataAssetMaster, ['class' => 'form-control']),

                ],
//                'number1',
//                'number2',
//                'number3',
                [
                    'attribute' => 'received_date',
                    'format' => ['Date', 'php:d-M-Y'],
                    'visible' => true,
                ],
                'received_year',
                [
                    'attribute' => 'price_received',
                    'format' => ['decimal'],
                    'visible' => true,
                    'hAlign' => 'right',

                ],
                [
                    'attribute' => 'quantity',
                    'format' => ['decimal'],
                    'visible' => true,
                    'hAlign' => 'right',

                ],
                [
                    'attribute' => 'statusReceived.status_received',
                    'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $dataStatusReceived, ['class' => 'form-control']),
                ],

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_received);
                            $url = Url::toRoute(['view', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_received);
                            $url = Url::toRoute(['update', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to update this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_received);
                            $url = Url::toRoute(['delete', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ],
                ],
            ],
        ]); ?>
    </div>
    <?php Pjax::end(); ?>

</div>
