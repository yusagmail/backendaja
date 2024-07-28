<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemIncident */

$this->title = 'Detail pelaporan asset rusak';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Incidents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary asset-item-incident-view">

    <div class="box-header with-border">

<?= Html::a('<< Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_incident], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_incident], [
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
//            'id_asset_item_incident',
            'assetMaster.asset_name',
            'incident_date',
//            'incident_datetime',
            'incident_notes:ntext',
            'reported_by',
//            'reported_user_id',
//            'reported_ip_address',



//            'photo2',
//            'photo3',
//            'photo4',
//            'photo5',
        ],
    ]) ?>
</div>
