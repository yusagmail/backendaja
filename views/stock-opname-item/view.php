<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameItem */

//$this->title = $model->id_stock_opname_item;
$this->title = 'Detail '.'Stock Opname Item';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_stock_opname_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_stock_opname_item], [
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
                'redundat_barcode_code',
            'keterangan',
            'entry_time',
            'created_user_id',
            ],
        ]) ?>

    </div>
</div>
