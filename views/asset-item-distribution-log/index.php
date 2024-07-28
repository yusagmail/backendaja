<?php

use common\labeling\CommonActionLabelEnum;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemDistributionLogController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Distribution Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-distribution-log-index box box-primary">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

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

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'assetMaster.asset_name',
            'distribute_to',
            'id_pegawai',
            'from_id_pegawai',
            //'id_departement',
            //'id_asset_item_location',
            //'status',
            //'start_date',
            //'start_month',
            //'start_year',
            //'status_distribution',
            //'end_date',
            //'end_month',
            //'end_year',
            //'duration',
            //'handover_by',
            //'handover_condition_notes',
            //'id_mst_status_condition',
            //'handover_photos1',
            //'handover_photos2',
            //'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
