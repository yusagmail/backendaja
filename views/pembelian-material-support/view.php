<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PembelianMaterialSupport */

//$this->title = $model->id_pembelian_material_support;
$this->title = 'Detail '.'Pembelian Material Support';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Material Support', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body pembelian-material-support-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_pembelian_material_support], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pembelian_material_support], [
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
                'tanggal_pembelian',
                [
                    'attribute' => 'id_material_support',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialSupport)) {
                            return $data->materialSupport->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>false
                ],
                'nomor_faktur',
                'jumlah',
                'harga_satuan',
                'keterangan',
            //'created_date',
            //'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
