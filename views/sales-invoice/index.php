<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Invoice';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body sales-order-index">


        <p>
            <?php //= Html::a('<i class="fa fa-plus"></i> Tambah Sales Invoice', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>


        <?php
        $dataListCustomer = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Customer::find()
            ->orderBy([
                'nama_customer' => SORT_ASC
            ])
            //->where(['id_parent_topnav' => 0])
            ->all(), 'id_customer', 'nama_customer');

        ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
            'export' => [
                'label' => 'Export',
            ],

            'exportConfig' => [
                GridView::EXCEL => [
                    'label' => 'Save as EXCEL',
                    'iconOptions' => ['class' => 'text-success'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Data ' . $this->title,
                    'alertMsg' => 'Export Data to Excel.',
                    'mime' => 'application/vnd.ms-excel',
                    'config' => [
                        'worksheet' => 'ExportWorksheet',
                        'cssFile' => ''
                    ],

                ],
                GridView::CSV => [
                    'label' => 'Save as CSV',
                    'iconOptions' => ['class' => 'text-primary'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Data CSV ' . $this->title,
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'tanggal_order',
                [
                    'attribute' => 'tanggal_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                    },
                    'filter' => dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_order',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                ],
                'nomor_sales_order',
                //'nomor',
                'month',
                'year',
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
                    'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
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
                    'filter'=>false,
                    //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                ],
                //'status_invoice',
                [
                    'attribute' => 'status_invoice',
                    'format' =>'raw',
                    'value' => function($model){
                        switch($model->status_invoice ){
                            case "BELUM":
                                return '<span class="label label-warning">BELUM</span>';
                            case "INVOICE":
                                return '<span class="label label-success">INVOICE</span>';
                            case "CANCEL":
                                return '<span class="label label-danger">CANCEL</span>';
                        }
                        return "--";
                    },

                ],
                [
                    'label' => 'Buat Invoice',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_order);
                        if($data->status_invoice == 'BELUM'){
                            return Html::a(
                                '<i class="fa fa-fw fa-barcode"></i> Buat Invoice',
                                ['sales-invoice/update-invoice', 'i' => $i],
                                ['class' => 'btn btn-success btn-xs']
                            );
                        }

                         if($data->status_invoice == 'INVOICE'){
                            return Html::a(
                                '<i class="fa fa-fw fa-barcode"></i> Update Invoice',
                                ['sales-invoice/update-invoice', 'i' => $i],
                                ['class' => 'btn btn-warning btn-xs']
                            );
                        }

                        return '--';
                        
                    }
                ],
                                [
                    'label' => 'Lihat Invoice',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_order);
                        if($data->status_invoice == 'INVOICE'){
                            return Html::a(
                                '<i class="fa fa-fw fa-eye"></i> Lihat',
                                ['sales-invoice/view', 'i' => $i],
                                ['class' => 'btn btn-info btn-xs']
                            );
                        }else{
                            return '--';
                        }
                    }
                ],
                //'invoice_total',
                //'bayar_total_bayar',
                //'bayar_cara',
                //'bayar_uang_muka',
                //'bayar_bukti',
                //'status_order',
                //'created_date',
                //'created_ip_address',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>