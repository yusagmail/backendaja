<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetItemDeletion */

$this->title = 'Detail Asset Item Deletions';
$this->params['breadcrumbs'][] = ['label' => 'Asset Item Deletions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box box-header box box-primary asset-item-deletion-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_asset_item_deletion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_item_deletion], [
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
//            'id_asset_item_deletion',
            'assetMaster.asset_name',
            'status_deletion',
            'execution_date',
            'execution_month',
            'execution_year',
            'execution_id_user',
            'execution_user',
            'income',
            'id_mst_status_condition',
            'condition_when_deletion',
            'acquisition_by',
            'grant_to',
            'photo1',
            'photo2',
            'notes',
        ],
    ]) ?>

</div>
