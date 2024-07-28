<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInItemProcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Detail Laporan Tahunan Per Tahun " . $tanggal_proses
?>
<div class="box">
    <div class="box-body material-in-item-proc-index">


        <div class="callout callout-info">


            <p>Laporan ini telah difilter berdasakan tahun proses <?= $tanggal_proses ?></p>
        </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
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
                'tanggal_proses',
                'yard_awal',
                'yard_hasil1',
                'yard_hasil2',
                'yard_hasil3',
                //'yard_hasil4',
                //'yard_hasil5',
                //'yard_hasil6',
                //'yard_hasil_total',
                'buang1',
                'buang2',
                'selisih_lebih',
                'selisih_kurang',
                /*
                [
                    'attribute' => 'is_packing',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->is_packing == 1) {
                            return "SUDAH PACKING";
                        } else {
                            return "BELUM PACKING";
                        }
                    },
                ],
                [
                    'attribute' => 'id_basic_packing',
                    'format' => 'raw',
                    'label' => 'Basic Packing',
                    'value' => function ($data) {
                        if (isset($data->basicPacking)) {
                            return $data->basicPacking->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                */
                //'created_date',
                //'created_ip_address',
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>