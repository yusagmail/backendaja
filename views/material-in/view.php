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
                'varian',
                //'tanggal_proses',
                [
                    'attribute' => 'tanggal_proses',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_proses);
                    },
                ],
                'catatan',
                'nomor_surat_jalan',
                //'tanggal_surat_jalan',
                [
                    'attribute' => 'tanggal_surat_jalan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_surat_jalan);
                    },
                ],
                
                //'created_date',
                //'created_ip_address',
            ],
        ]) ?>

        <?= $this->render('/material-in/_rekapitulasi', [
            'total_yard_awal' =>$total_yard_awal,
            'total_yard_hasil' =>$total_yard_hasil,
            'total_buang' =>$total_buang,
            'total_selisih_kurang' =>$total_selisih_kurang,
            'total_selisih_lebih' =>$total_selisih_lebih,
        ]) ?>

    </div>
</div>


<?= $this->render('/material-in/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip'=>$id,
]) ?>
