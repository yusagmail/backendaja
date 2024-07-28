<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PickingListItem */

//$this->title = $model->id_picking_list_item;
$this->title = 'Detail '.'Picking List Item';
$this->params['breadcrumbs'][] = ['label' => 'Picking List Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body picking-list-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_picking_list_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_picking_list_item], [
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
                'item_id',
            'item_name',
            'size',
            'location',
            'qty',
            'unit',
            'created_date',
            'created_user_id',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
