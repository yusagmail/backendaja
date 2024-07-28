<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

//$this->title = $model->id_asset_dismantle_received;
$this->title = 'Detail '.'Asset Dismantle Received';
$this->params['breadcrumbs'][] = ['label' => 'Asset Dismantle Received', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-dismantle-received-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_asset_dismantle_received], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_dismantle_received], [
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
                'received_date',
            'notes',
            'is_approved',
            'approval_user_id',
            'approval_date',
            'approval_ip_address',
            ],
        ]) ?>

    </div>
</div>
