<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstStatusDismantleOrder */

//$this->title = $model->id_mst_status_dismantle_order;
$this->title = 'Detail '.'Mst Status Dismantle Order';
$this->params['breadcrumbs'][] = ['label' => 'Mst Status Dismantle Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-status-dismantle-order-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_status_dismantle_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_status_dismantle_order], [
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
                'status_dismantle_order',
            ],
        ]) ?>

    </div>
</div>
