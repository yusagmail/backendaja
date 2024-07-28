<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PurchaseRawSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pembelian Geirge';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body basic-packing-index">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Pembelian Geirge', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
            'export' => [
                'label' => 'Export',
            ],
            'pager' => [
                'firstPageLabel' => 'First',
                'lastPageLabel'  => 'Last'
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
                //'month',
                //'year',
                //'total_tagihan',
                //'bayar_total_bayar',
                //'bayar_cara',
                //'bayar_tanggal_bayar',
                //'bayar_id_bank_pembayaran',
                //'bayar_bukti',
                //'status_purchasing',
                //'status_pembayaran',
                //'created_id_user',
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>