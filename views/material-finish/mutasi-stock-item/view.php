<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockItem */

//$this->title = $model->id_mutasi_stock_item;
$this->title = 'Detail '.'Mutasi Stock Item';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mutasi-stock-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mutasi_stock_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mutasi_stock_item], [
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
                'keterangan',
            ],
        ]) ?>

    </div>
</div>
