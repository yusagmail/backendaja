<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSampel */

$this->title = 'Detail ' . 'Material Sampel';
$this->params['breadcrumbs'][] = ['label' => 'Material Sampel', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body purchase-raw-item-view">
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_sampel], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_sampel], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        */ ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id_material_sampel',
                // 'id_customer',
                [
                    'attribute' => 'id_customer',
                    'format' => 'raw',
                    'label' => 'Customer',
                    'value' => function ($data) {
                        if (isset($data->customer)) {
                            return $data->customer->nama_customer;
                        } else {
                            return "--";
                        }
                    },
                ],
                'nama_sampel',
                // 'id_material_raw_kategori',
                [
                    'attribute' => 'id_material_raw_kategori',
                    'format' => 'raw',
                    'label' => 'Material Raw Kategori',
                    'value' => function ($data) {
                        if (isset($data->materialRawKategori)) {
                            return $data->materialRawKategori->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                'tanggal_minta_sampel',
                'tanggal_keluar_sampel',
                // 'id_subcontractor',
                [
                    'attribute' => 'id_subcontractor',
                    'format' => 'raw',
                    'label' => 'Subcontractor',
                    'value' => function ($data) {
                        if (isset($data->subcontractor)) {
                            return $data->subcontractor->nama_subcontractor;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material',
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'label' => 'Material',
                    'value' => function ($data) {
                        if (isset($data->material)) {
                            return $data->material->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori1',
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    'label' => 'Material Kategori 1',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori2',
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    'label' => 'Material Kategori 2',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori3',
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    'label' => 'Material Kategori 3',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                'kode_barcode',
                'keterangan',
                'status',
                // 'created_id_user',
                // 'created_date',
                // 'created_ip_address',
            ],
        ]) ?>
        <?php
        echo Html::a(
                'CETAK LABEL',
                ['material-sampel/generate-barcode', 'id' => $model->id_material_sampel, 'label' => 1,],
                ['class' => 'btn btn-warning btn-sm']);
        ?>
    </div>
</div>