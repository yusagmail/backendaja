<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OutletPenjualan */

//$this->title = $model->id_outlet_penjualan;
$this->title = 'Detail '.'Outlet Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Outlet Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body outlet-penjualan-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_outlet_penjualan], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_outlet_penjualan], [
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
                'nama_outlet',
                'kode_outlet',
            'alamat',
            'kota',
            'logo',
            'longitude',
            'latitude',
            'keterangan',
            ],
        ]) ?>

    </div>
</div>
