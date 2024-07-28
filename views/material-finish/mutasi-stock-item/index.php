<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MutasiStockItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="box">
    <div class="box-body mutasi-stock-item-index">
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'tanggal_mutasi',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock)) {
                            return $data->mutasiStock->tanggal_mutasi;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    'attribute' => 'nomor_surat',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock)) {
                            return $data->mutasiStock->nomor_surat;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    //'attribute' => 'id_gudang_asal',
                    'label' => 'Gudang Asal',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock->gudangAsal)) {
                            return $data->mutasiStock->gudangAsal->nama_gudang;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    //'attribute' => 'id_gudang_tujuan',
                    'label' => 'Gudang Tujuan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock->gudangTujuan)) {
                            return $data->mutasiStock->gudangTujuan->nama_gudang;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    //'attribute' => 'id_pemberi_perintah',
                    'label' => 'Pemberi Perintah',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock->pemberiPerintah)) {
                            return $data->mutasiStock->pemberiPerintah->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    //'attribute' => 'id_pelaksana_perintah',
                    'label' => 'Pelaksana Perintah',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mutasiStock->pelaksanaPerintah)) {
                            return $data->mutasiStock->pelaksanaPerintah->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },
   
                ],
                'keterangan',
                [
                    'label' => 'Lihat Surat Mutasi',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        //$i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_mutasi_stock);
                        $i = $data->id_mutasi_stock;
                        return Html::a(
                            '<i class="fa fa-fw fa-barcode"></i> Surat Mutasi',
                            ['mutasi-stock/view', 'id' => $i],
                            ['class' => 'btn btn-success btn-xs']
                        );

                    
                    }
                ],
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
