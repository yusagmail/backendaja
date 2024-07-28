<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesRetur */

//$this->title = $model->id_sales_retur;
$this->title = 'Detail '.'Sales Retur';
$this->params['breadcrumbs'][] = ['label' => 'Sales Retur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-retur-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_retur], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_retur], [
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
                'tanggal_retur',
            'alasan_retur',
            'catatan_kondisi_barang',
            ],
        ]) ?>

    </div>
</div>
