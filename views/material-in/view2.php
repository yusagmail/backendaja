<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

//$this->title = $model->id_material_in;
$this->title = 'Detail '.'Material In';
$this->params['breadcrumbs'][] = ['label' => 'Material In', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-in-view">

        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_in], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_in], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        */ ?>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'mater.nama',
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
                    
                    //'created_date',
                    //'created_ip_address',
                ],
            ]) ?>
            </div>
             <div class="col-md-6 col-sm-6 col-xs-12">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
   
                    //'tanggal_proses',
                    [
                        'attribute' => 'tanggal_proses',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_proses);
                        },
                    ],
                   
                    'nomor_surat_jalan',
                    [
                        'attribute' => 'id_supplier',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->supplier)) {
                                return $data->supplier->name_company;
                            } else {
                                return "--";
                            }
                        },
                    ],
                    //'tanggal_surat_jalan',
                    [
                        'attribute' => 'tanggal_surat_jalan',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_surat_jalan);
                        },
                    ],
                    'catatan',
                    
                    //'created_date',
                    //'created_ip_address',
                ],
            ]) ?>
            </div>
        </div>

        <?= $this->render('/material-in/_rekapitulasi', [
            'total_yard_awal' =>$total_yard_awal,
            'total_yard_hasil' =>$total_yard_hasil,
            'total_buang' =>$total_buang,
            'total_selisih_kurang' =>$total_selisih_kurang,
            'total_selisih_lebih' =>$total_selisih_lebih,
            'id'=>$id
        ]) ?>

    </div>
</div>

<?php //= $this->render('/material-in/item/index2', [ ?>
<?= $this->render('/material-in/item/indexh10', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip'=>$id,
]) ?>
