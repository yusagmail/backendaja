<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\MutasiStockItemSearch;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

//$this->title = $model->id_material_finish;
$this->title = 'History Perpindahan '.'Barang Jadi';
$this->params['breadcrumbs'][] = ['label' => 'List History', 'url' => ['index-history-moving']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-finish-view">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
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
                        
                        
                        
                    ],
                ]) ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
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


        <?php 
        //Detail
        $searchModel = new MutasiStockItemSearch();
        $searchModel->id_material_finish = $model->id_material_finish;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination = false;

        echo $this->render('mutasi-stock-item/index', [
            'model' => $model,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]) ?>

    </div>
</div>
