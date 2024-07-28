<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInItemProcSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = "Detail Laporan Harian Per Tanggal ".common\helpers\Timeanddate::getShortDateIndo($tanggal_proses);
?>
<div class="box">
    <div class="box-body material-in-item-proc-index">


<div class="callout callout-info">


    <p>Laporan ini telah difilter berdasakan tanggal proses <?= common\helpers\Timeanddate::getShortDateIndo($tanggal_proses) ?></p>
  </div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> '.$this->title],
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
                    'filename' => 'Data '.$this->title,
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
                    'filename' => 'Data CSV '.$this->title,
                    'alertMsg' => 'Export Data to CSV.',
                    'options' => ['title' => 'Comma Separated Values'],
                    'mime' => 'application/csv',
                    'config' => [
                        'colDelimiter' => ",",
                        'rowDelimiter' => "\r\n",
                    ],
                ],
                /*
                GridView::PDF => [
                    'label' => 'PDF',
                    'icon' =>  'file-pdf-o',
                    'iconOptions' => ['class' => 'text-danger'],
                    'showHeader' => true,
                    'showPageSummary' => true,
                    'showFooter' => true,
                    'showCaption' => true,
                    'filename' => 'Data PDF '.$this->title,
                    'alertMsg' => 'The PDF export file will be generated for download',
                    'options' => ['title' => 'Portable Document Format'],
                    'mime' => 'application/pdf',
                    'config' => [
                        'mode' => 'c',
                        'format' => 'A4-L',
                        'destination' => 'D',
                        'marginTop' => 20,
                        'marginBottom' => 20,
                        'cssInline' => '.kv-wrap{padding:20px;}' .
                            '.kv-align-center{text-align:center;}' .
                            '.kv-align-left{text-align:left;}' .
                            '.kv-align-right{text-align:right;}' .
                            '.kv-align-top{vertical-align:top!important;}' .
                            '.kv-align-bottom{vertical-align:bottom!important;}' .
                            '.kv-align-middle{vertical-align:middle!important;}' .
                            '.kv-page-summary{border-top:4px double #ddd;font-weight: bold;}' .
                            '.kv-table-footer{border-top:4px double #ddd;font-weight: bold;}' .
                            '.kv-table-caption{font-size:1.5em;padding:8px;border:1px solid #ddd;border-bottom:none;}',
                        'methods' => [
                            'SetHeader' => [
                                ['odd' => $pdfHeader, 'even' => $pdfHeader]
                            ],
                            'SetFooter' => [
                                ['odd' => $pdfFooter, 'even' => $pdfFooter]
                            ],
                        ],
                        'options' => [
                            'title' => $this->title,
                            'subject' => 'PDF Subject',
                            'keywords' => 'key1, key2, key3'
                        ],
                        'contentBefore'=>'',
                        'contentAfter'=>''
                    ]
                ],
                */
            ],
            'options' => ['style' => ['font-size'=>'12px']],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'tanggal_proses',
                [
                    'attribute' => 'tanggal_proses',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data["tanggal_proses"]);
                    },
                ],          
                'nama',
                //'id_material',
                /*
                [
                    //'attribute' => 'is_packing',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->id_material;
                        if(isset($data->mater)){
                            return $data->mater->nama; 
                        } else {
                            return "--";
                        }
                    },
                ],
                */
                'yard_awal',
                'yard_hasil1',
                'yard_hasil2',
                'yard_hasil3',
                'yard_hasil4',
                'yard_hasil5',
                'yard_hasil6',
                'yard_hasil7',
                'yard_hasil8',
                'yard_hasil9',
                'yard_hasil10',
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