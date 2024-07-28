<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Pendapatan Harian';
$this->params['breadcrumbs'][] = $this->title;

//Base Pendapatan
$base = 4000;
?>
<div class="box">
    <div class="box-body material-in-index">

    <div class="row">
        <div class="box-body">
        <?php /*
        <?= $this->render('_grafik_laporan_bulanan', [
             'dataProvider' => $dataProvider,
        ]) ?>
        */ ?>
        </div>
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
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'mater.nama',
                [
                    'attribute' => 'tanggal_proses',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data["tanggal_proses"]);
                    },
                ],
                /*
                [
                    'attribute' => 'tanggal_proses',
                    //'format' => 'raw',
                    'value' => function ($data)  {
                        return $data->tanggal_proses;
                    }
                ],
                */
                'jml_transaksi',
                'total_yard_awal',
                [
                    'label' => 'Pendapatan',
                    'format' => 'raw',
                    'value' => function ($data) use ($base) {
                        return $data["total_yard_awal"]*$base;
                    },
                    'format' => ['currency', 'Rp.'],
                    //'headerOptions' => ['style' => 'text-align: right;'],
                    'contentOptions' => ['style' => 'text-align: right;'],
                ],
                //'total_yard_hasil',
                //'total_buang',
                /*
                [
                    'label' => 'Detail',
                    'format' => 'raw',
                    'value' => function ($data)  {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i>Detail',
                            ['material-in/laporan-harian-detail', 'tanggal_proses' => $data["tanggal_proses"]],
                            ['class' => 'btn btn-success btn-sm']
                        );
                    }
                ],
                */
                //'total_yard_hasil2',
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


</div>