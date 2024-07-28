<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameStatus */

//$this->title = $model->id_stock_opname_status;
$this->title = 'Detail '.'Stock Opname Status';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-status-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_stock_opname_status], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_stock_opname_status], [
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
                'status',
            'tgl_dibuat',
            'waktu_mulai',
            'waktu_terakhir',
            'created_date',
            'created_user_id',
            'created_ip_address',
            'modified_date',
            'modified_ip_address',
            ],
        ]) ?>

    </div>
</div>
