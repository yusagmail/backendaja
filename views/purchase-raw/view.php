<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseRaw */

$this->title = 'Detail ' . 'Pembelian Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body purchase-raw-view">
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_purchase_raw], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_purchase_raw], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p> */ ?>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                // 'id_purchase_raw',
                'tanggal_order',
                // 'id_supplier',
                [
                    'attribute' => 'id_supplier',
                    'format' => 'raw',
                    'label' => 'Supplier',
                    'value' => function ($data) {
                        if (isset($data->supplier)) {
                            return $data->supplier->nama_supplier;
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
                // 'status_purchasing',
                // 'status_pembayaran',
                // 'created_id_user',
                // 'created_date',
                // 'created_ip_address',
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('/purchase-raw/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip' => $id,
]) ?>