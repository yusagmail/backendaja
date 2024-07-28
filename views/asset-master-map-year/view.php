<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetMasterMapYear */

$this->title = $model->id_asset_master_map_year;
$this->params['breadcrumbs'][] = ['label' => 'Asset Master Map Years', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="asset-master-map-year-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_master_map_year], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_master_map_year], [
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
            'id_asset_master_map_year',
            'id_asset_master',
            'year',
            'current_count',
            'total_need',
            'updated_date',
            'updated_user',
            'updated_ip_address',
        ],
    ]) ?>

</div>
