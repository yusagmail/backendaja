<?php

use common\labeling\CommonActionLabelEnum;
use backend\models\AppVocabularySearch;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemMaintenance */

$this->title = CommonActionLabelEnum::VIEW . "" . AppVocabularySearch::getValueByKey(' Asset Item Maintenance');
$this->params['breadcrumbs'][] = ['label' => CommonActionLabelEnum::LIST_ALL . ' ' . AppVocabularySearch::getValueByKey(' Asset Item Maintenance'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary asset-item-maintenance-view">
    <div class="box-header with-border">
        <p>
            <?= Html::a('<< ' . CommonActionLabelEnum::BACK, ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_maintenance], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_maintenance], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
//            'id_asset_item_maintenance',
                'assetMaster.asset_name',
                'criteria.criteria',
                'last_primer_value',
                'maintenance_date',
                'id_vendor',
                'carried_to_vendor_by',
                'estimated_day',
                'status_maintenance',
                'maintenance_finish_date',
                'maintenance_cost',
                'received_date',
                'received_user',
                'maintenance_info',
                'sparepart_changes_info',
                'last_condition_report',
            ],
        ]) ?>
    </div>

</div>
