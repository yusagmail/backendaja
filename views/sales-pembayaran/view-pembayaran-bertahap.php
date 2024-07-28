<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\SalesJurnal;
use backend\models\SalesJurnalSearch;
/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

//$this->title = $model->id_sales_order;
$this->title = 'Lihat Data Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Sales Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-order-view">
        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_order], [
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
    <?php /*
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">

        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <?= $this->render('/sales-pembayaran/_view_tagihan_tunai', [
            'model' => $model,
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
        </div>
    </div>
    */ ?>


    <?php
    $searchModel = new SalesJurnalSearch();
    $searchModel->id_sales_order = $model->id_sales_order;
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    $dataProvider->pagination = false;

    echo $this->render('sales-jurnal/index-read-only', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
        'model' => $model,
        'i'=>$i,
    ]);
    ?>
    </div>
</div>

