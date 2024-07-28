<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemTrackingDeviceLogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device Log');;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-tracking-device-log-index box box-success">

    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <div class="box-body table-responsive">
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Asset Item Tracking Device Log'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],
                [
                    'label' => 'Asset Tracking Device',
                    'attribute' => 'trackingDevice.asset_name',
                ],
                'id_asset_item',
                'id_device',
                'installed_date',
                'installed_by',
                'status_active',
                'notes',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
