<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemTrackingLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Item Tracking Log');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-tracking-log-index box box-success">


    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="box-body">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Asset Item Tracking Log'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],
                [
                    'label' => 'Asset Name',
                    'attribute' => 'id_asset_item',
                ],
                [
                    'label' => 'Device Tracking',
                    'attribute' => 'id_device_tracking',
                ],
                [
                    'label' => 'Asset Name',
                    'attribute' => 'id_asset_item',
                ],
                'log_date',
                'log_datetime',
                //'device_logtime',
                //'longitude',
                //'latitude',
                //'full_message',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
