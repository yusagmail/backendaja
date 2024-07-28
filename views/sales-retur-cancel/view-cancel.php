<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

//$this->title = $model->id_sales_order;
$this->title = 'Cancel '.'Sales Invoice';
$this->params['breadcrumbs'][] = ['label' => 'Sales Invoice', 'url' => ['index-cancel']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
        <div class="callout callout-warning">


        <p>Untuk cancel invoice, silakan pilih tombol cancel yang paling bawah. 
        Pastikan juga untuk perubahan status pembayarannya.
        </p>
        </div>
<div class="box">
    <div class="box-body sales-order-view">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= DetailView::widget([
                    'model' => $model,
                    
                    'attributes' => [
                        //'tanggal_order',
                        [
                            'attribute' => 'tanggal_order',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                            },

                        ],
                        'nomor_sales_order',
                        //'nomor',
                        //'month',
                        //'year',
                        /*
                        [   
                            'attribute' => 'id_customer',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->customer)) {
                                    return $data->customer->nama_customer;
                                } else {
                                    return "--";
                                }
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                        ],
                        [   
                            'attribute' => 'id_outlet_penjualan',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->outletPenjualan)) {
                                    return $data->outletPenjualan->nama_outlet;
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        */
                        /*
                        'invoice_total',
                        'bayar_total_bayar',
                        'bayar_cara',
                        'bayar_uang_muka',
                        'bayar_bukti',
                        'status_order',
                        'created_date',
                        'created_ip_address',
                        */
                    ],
                ]) ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'tanggal_order',
                        /*
                        [
                            'attribute' => 'tanggal_order',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                            },

                        ],
                        'nomor_sales_order',
                        */
                        //'nomor',
                        //'month',
                        //'year',
                        [   
                            'attribute' => 'id_customer',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->customer)) {
                                    return $data->customer->nama_customer;
                                } else {
                                    return "--";
                                }
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                        ],
                        [   
                            'attribute' => 'id_outlet_penjualan',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->outletPenjualan)) {
                                    return $data->outletPenjualan->nama_outlet;
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        
                        /*
                        'invoice_total',
                        'bayar_total_bayar',
                        'bayar_cara',
                        'bayar_uang_muka',
                        'bayar_bukti',
                        'status_order',
                        'created_date',
                        'created_ip_address',
                        */
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>

<?= $this->render('/sales-retur-cancel/update-invoice/index-view-only', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip'=>$id,
    'i'=>$i,
    'total' => $total,
]) ?>