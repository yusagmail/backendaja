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

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetReceivedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Numbering');
$this->params['breadcrumbs'][] = $this->title;

$dataAssetMaster = ['' => 'Choose'] + ArrayHelper::map(AssetMaster::find()->all(), 'id_asset_master', 'asset_name');
$dataStatusReceived = ['' => 'Choose'] + ArrayHelper::map(MstStatusReceived::find()->all(), 'id_status_received', 'status_received');
?>
<div class="asset-received-index box box-success">

    <!--    <h1>--><?php //Html::encode($this->title) ?><!--</h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="box-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Asset Numbering'],
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
                    'format'=>['Date','php:d-M-Y']
                ],
//                'received_year',
                [
                    'attribute'=> 'price_received',
                    'format' => ['decimal'],
                ],
                [
                    'attribute'=> 'quantity',
                    'format' => ['decimal'],
                ],
                [
                    'attribute' => 'statusReceived.status_received',
                    'filter' => Html::activeDropDownList($searchModel, 'id_asset_master', $dataStatusReceived, ['class' => 'form-control']),
                ],
                [
					'header'=>AppVocabularySearch::getValueByKey('Nomor Aset'),
                    'class'=> 'yii\grid\ActionColumn',
                    'template' => '{view}',
                     'buttons'=>[
                              'view' => function ($url, $model) {
								$label = AppVocabularySearch::getValueByKey('Nomor Aset');
								$u = EncryptionDB::staticEncryptor('encrypt', $model->id_asset_received);
								$url = Url::toRoute(['numbering-view','u'=>$u]);
                                return Html::a('<span class="btn btn-sm btn-success">'.$label.'</span>', $url, [
									'title' => Yii::t('yii', $label),]);
                              }
                          ]
                ],
            ],
        ]); ?>
    </div>
</div>
