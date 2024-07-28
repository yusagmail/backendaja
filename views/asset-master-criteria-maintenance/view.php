<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterCriteriaMaintenance */

$this->title = 'Detail Asset Master Criteria Maintenance';
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Criteria Maintenances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-master-criteria-maintenance-view box box-primary">

    <div class="box-header with-border">

        <?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_master_criteria_maintenance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_master_criteria_maintenance], [
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
//            'id_asset_master_criteria_maintenance',
            'assetMaster.asset_name',
            'criteria',
            'type_criteria',
            'periodic_value',
            'metric',
            'notes',
        ],
    ]) ?>

</div>
