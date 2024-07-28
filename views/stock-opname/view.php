<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

//$this->title = $model->id_stock_opname;
$this->title = 'Detail '.'Stock Opname';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_stock_opname], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_stock_opname], [
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
                'tanggal_stock_opname',
                'nama_kegiatan',
                'keterangan',
                /*
                'created_date',
                'created_user_id',
                'created_ip_address',
                */
            ],
        ]) ?>

    </div>
</div>
