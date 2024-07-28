<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

\yii\web\YiiAsset::register($this);
?>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'kode',
                'barcode_kode',
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mater)) {
                            return $data->mater->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                //'mater.kode',
                /*
                [
                    'attribute' => 'id_material',
                    'label' => 'Kode',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mater)) {
                            return $data->mater->kode;
                        } else {
                            return "--";
                        }
                    },
                ],
                */
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },

                ],
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },

                ],
                'yard',
                
                'year',
                'no_urut',
                //'no_urut_kode',
                [
                    'label' => 'Join',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->is_join_packing){
                            return "Join Packing"." [".$data->join_info."]";
                        }else{
                            return "Tidak Ada (Tanpa Join)";
                        }
                    },

                ],
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                ],
                
                'deskripsi',
                //'is_packing',
                //'created_date',
                //'created_ip_address',
            ],
        ]) ?>



