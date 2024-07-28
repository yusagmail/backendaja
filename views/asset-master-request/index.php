<?php

use common\labeling\CommonActionLabelEnum;
use common\utils\EncryptionDB;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetMasterRequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Pengajuan Asset');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success">
    <?php echo $this->render('_search_pengajuan', ['model' => $searchModel]); ?>
</div>
<div class="asset-received-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Pengajuan Asset'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

//            'id_asset_master_request',
                //'assetMaster.asset_name',
                [
                    'label' => 'Kategori Aset',
                    'attribute' => 'assetMaster.asset_name',
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_type_asset1', $dataList1, ['class' => 'form-control']),
                ],
                'quantity',
                'request_date',
//            'request_datetime',
                'request_notes:ntext',
                'requested_by',
                //'requested_user_id',
                //'requested_ip_address',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Action',
                    'headerOptions' => ['style' => 'color:#337ab7'],
                    'template' => '{view}{update}{delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_master_request);
                            $url = Url::toRoute(['view', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
                                'title' => Yii::t('app', 'View'),
                            ]);
                        },
                        'update' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_master_request);
                            $url = Url::toRoute(['update', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to update this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_master_request);
                            $url = Url::toRoute(['delete', 'c' => $ic]);
                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'data' => [
                                    'confirm' => 'Are you sure you want to delete this item?',
                                    'method' => 'post',
                                ],
                            ]);
                        }
                    ],
                ],],
        ]); ?>
    </div>
</div>
