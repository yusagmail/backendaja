<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesReturItem */

//$this->title = $model->id_sales_retur_item;
$this->title = 'Detail '.'Sales Retur Item';
$this->params['breadcrumbs'][] = ['label' => 'Sales Retur Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-retur-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_retur_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_retur_item], [
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
                'retur_created_date',
            'retur_created_ip_address',
            'yard',
            'kode',
            'year',
            'no_urut',
            'no_urut_kode',
            'no_splitting',
            'barcode_kode',
            'deskripsi',
            'is_packing',
            'is_join_packing',
            'join_info',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
