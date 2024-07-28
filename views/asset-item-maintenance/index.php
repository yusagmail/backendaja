<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use kartik\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemMaintenanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $this->title = CommonActionLabelEnum::LIST_ALL . " " . AppVocabularySearch::getValueByKey(' Asset Item Maintenance');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-maintenance-index box box-primary">

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
            'panel' => ['type' => 'primary', 'heading' => 'Asset Item Maintenance'],
            'toggleDataContainer' => ['class' => 'btn-group mr-2'],

            'columns' => [
                [
                    'header' => 'No',
                    'class' => 'yii\grid\SerialColumn'
                ],

                'assetItem.assetMaster.asset_name',
                'criteria.criteria',
                'last_primer_value',
                'maintenance_date',
                [
                    'attribute' => 'vendor.company',
                    'label' => 'Company'
                ],
                //'carried_to_vendor_by',
                //'estimated_day',
                //'status_maintenance',
                //'maintenance_finish_date',
                //'maintenance_cost',
                //'received_date',
                //'received_user',
                //'maintenance_info',
                //'sparepart_changes_info',
                //'last_condition_report',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>
