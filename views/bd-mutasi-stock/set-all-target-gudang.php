<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\MutasiStockItem;
use backend\models\MutasiStockItemSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStock */

//$this->title = $model->id_mutasi_stock;
$this->title = 'Detail '.'Mutasi Stock';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mutasi-stock-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                    [
                        'attribute' => 'tanggal_mutasi',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_mutasi);
                        },
                    ],
                    [
                        'attribute' => 'id_gudang_asal',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->gudangAsal)) {
                                return $data->gudangAsal->nama_gudang;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang_asal', $dataListGudang, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_gudang_tujuan',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->gudangTujuan)) {
                                return $data->gudangTujuan->nama_gudang;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang_tujuan', $dataListGudang, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_pemberi_perintah',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->pemberiPerintah)) {
                                return $data->pemberiPerintah->nama_lengkap;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_pemberi_perintah', $dataListPegawai, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_pelaksana_perintah',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->pelaksanaPerintah)) {
                                return $data->pelaksanaPerintah->nama_lengkap;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_pelaksana_perintah', $dataListPegawai, ['class' => 'form-control']),
                    ],
                    'keterangan',
            ],
        ]) ?>

        <div class="callout callout-info">
            <h4>Set All Target Gudang</h4>

            <p>Fitur ini digunakan untuk set jika mutasi barang tetapi target gudang tidak ikut berubah</p>

            <?= Html::a('Jalankan', ['set-all-target-gudang-run', 'i'=>$i], ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

    </div>
</div>
