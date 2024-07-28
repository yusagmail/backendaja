<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

//$this->title = $model->id_material_finish;
$this->title = 'Detail '.'Barang Jadi yang dihapus ';
$this->params['breadcrumbs'][] = ['label' => 'Barang Jadi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-finish-view">

        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_finish], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_finish], [
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
                'alasan_hapus',
                'deleted_date',
                //'deleted_user_id',
                [
                    
                    'attribute' => 'deleted_user_id',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->deletedUser)) {
                            return $data->deletedUser->full_name;
                        } else {
                            return "--";
                        }
                    },

                ],
             ],
        ]) ?>
        <h3>Barang yang dihapus</h3>
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

    </div>
</div>
