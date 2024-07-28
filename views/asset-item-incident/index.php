<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemIncidentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelaporan Asset Rusak';
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
            'panel' => ['type' => 'primary', 'heading' => 'Pelaporan Asset Rusak'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id_asset_item_incident',
				//'id_asset_item',
				'assetItem.assetMaster.asset_name',
                'assetItem.number1',
                'incident_date',
//            'incident_datetime',
                'incident_notes:ntext',
                //'reported_by',
                //'reported_user_id',
                //'reported_ip_address',
                //'photo1',
                //'photo2',
                //'photo3',
                //'photo4',
                //'photo5',
                ['class' => 'yii\grid\ActionColumn',
                    'template' => '{upload-foto}',
                    'header' => 'Foto',// the default buttons + your custom button
                    'contentOptions' => ['style' => 'width: 180px;'],
                    'buttons' => [
                        'upload-foto' => function ($url, $model, $key) {
                            if ($model->photo1 != "") {
                                $label = "Re-Upload Gambar";
//                            $res = '<img src="' . '..' . '/web/images/asset_kejadian/' . $model->photo1 . '" class="img-responsive" style="width:160px;
//                                display: block; margin-left: auto; margin-right: auto;">';
                                $res = '<small class="label bg-orange">' . $model->photo1 . '</small><Br>';
                            } else {
                                $res = '<small class="label bg-orange">Gambar tidak ada</small><Br>';
                                $label = "Upload Gambar";
                            }
                            $res .= '<br>';
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident);
                            $urlreset = Url::toRoute(['upload-foto', 'c' => $ic]);
                            $res .= Html::a($label, $urlreset, ['class' => 'btn btn-sm btn-success btn-block']);

                            if ($model->photo1 != "") {
                                $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident);
                                $urlreset = Url::toRoute(['', 'c' => $ic]);
                                $res .= Html::a('Reset Image', $urlreset,
                                    [
                                        'class' => 'btn btn-sm btn-warning btn-block',
                                        'data' => [
                                            'confirm' => 'Are you sure want to reset?',
                                            'method' => 'post',
                                        ],
                                    ]);
                            }
                            return $res;
                        }
                    ]
                ],


                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident);
                            $url = Url::toRoute(['view', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident);
                            $url = Url::toRoute(['update', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to update this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_item_incident);
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
</div>
