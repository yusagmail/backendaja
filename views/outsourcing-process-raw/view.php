<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\OutsourcingProcessRaw */

$this->title = 'Detail ' . 'Pengiriman Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pengiriman Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body purchase-raw-view">
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_outsourcing_process_raw], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_outsourcing_process_raw], [
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
                // 'id_outsourcing_process_raw',
                'tanggal_proses',
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
                'nomor_kontrak',
                'nomor_surat_jalan',
                // 'month',
                // 'year',
                // 'total_tagihan',
                // 'bayar_total_bayar',
                // 'bayar_cara',
                // 'bayar_tanggal_bayar',
                // 'bayar_id_bank_pembayaran',
                // 'bayar_bukti',
                // 'status_proses',
                // 'status_pembayaran',
                // 'created_id_user',
                // 'created_date',
                // 'created_ip_address',
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('/outsourcing-process-raw/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip' => $id,
]) ?>