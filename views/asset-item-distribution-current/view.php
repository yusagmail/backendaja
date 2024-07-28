<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDistributionCurrent */

$this->title = 'Detail Asset Item Distribution Currents';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Distribution Currents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary asset-item-distribution-current-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_distribution_current], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_distribution_current], [
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
//            'id_asset_item_distribution_current',
            'assetMaster.asset_name',
            'distribute_to',
            'pegawai.nama_lengkap',
            'department.departement_name',
            'location.address',
            'status',
            'start_date',
            'start_month',
            'start_year',
            'duration',
            'handover_by',
            'handover_condition_notes',
            'id_mst_status_condition',
            'handover_photos1',
            'handover_photos2',
            'notes',
        ],
    ]) ?>

</div>
