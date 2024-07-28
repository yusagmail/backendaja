<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemTrackingDeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Item Tracking Device');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-tracking-device-index box box-success">


    <div class="box-header with-border">
        <p>
            <?= Html::a(CommonActionLabelEnum::CREATE, ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="box-body">
        <div class="callout callout-info">
            Berikut ini adalah informasi device-device yang digunakan untuk membantu tracking sebuah aset. Beberapa device tersebut seperti GPS, dan sejenisnya. 
        </div>
        <?php Pjax::begin(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'showPageSummary' => true,
            'pjax' => true,
            'striped' => true,
            'hover' => true,
            'responsiveWrap' => false,
            'panel' => ['type' => 'primary', 'heading' => 'Asset Item Tracking Device'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],
            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],
                /*
                [
                    'label' => 'Asset Name',
                    'attribute' => 'id_asset_item',
                ],
                */
                [
                    'attribute' => 'id_asset_item',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->assetItem)) {
                            return $data->assetItem->getDefaultNameByNymber();
                        } else {
                            return "--";
                        }
                    },

                ],
                'number_device',
                'installed_date',
                'installed_by',
                'status_active',
                //'notes',

                [
                    'header' => 'Action',
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
