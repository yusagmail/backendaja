<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemRepairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Item Repair');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-index box box-primary">

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>

            <?php
            /*
            <?= Html::button('Import File',
                ['value' => Url::to(['/asset-item/import-file']),
                    'title' => 'Upload Data', 'class' => 'showModalButton btn btn-success']); ?>
             */
            ?>
        </p>
    </div>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Asset Item Repair'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],

//            'id_asset_item_repair',
                'assetMaster.asset_name',
                'id_asset_item_incident',
                'repair_date',
                'id_vendor',
                //'carried_to_vendor_by',
                //'estimated_day',
                //'status_repair',
                //'repair_finish_date',
                //'repair_cost',
                //'received_date',
                //'received_user',
                //'repair_info',
                //'sparepart_changes_info',
                //'last_condition_report',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair);
                            $url = Url::toRoute(['view', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair);
                            $url = Url::toRoute(['update', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to update this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_repair);
                            $url = Url::toRoute(['delete', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ],
                ],            ],
        ]); ?>
    </div>
</div>
