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

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mutasi_stock], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mutasi_stock], [
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

        <?php 
        //Detail
        $searchModel = new MutasiStockItemSearch();
        $searchModel->id_mutasi_stock = $model->id_mutasi_stock;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        echo $this->render('item/index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'ip'=>$model->id_mutasi_stock,
            'id'=>$model->id_mutasi_stock,
            'opt'=>$opt,
        ]) ?>

    </div>
</div>
