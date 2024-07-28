<?php

use common\labeling\CommonActionLabelEnum;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetItemDeletionController */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asset Item Deletions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asset-item-deletion-index box box-primary">

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

//            'id_asset_item_deletion',
            'assetMaster.asset_name',
            'status_deletion',
            'execution_date',
            'execution_month',
            //'execution_year',
            //'execution_id_user',
            //'execution_user',
            //'income',
            //'id_mst_status_condition',
            //'condition_when_deletion',
            //'acquisition_by',
            //'grant_to',
            //'photo1',
            //'photo2',
            //'notes',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
