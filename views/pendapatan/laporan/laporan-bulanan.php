<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Bulanan';
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
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
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
            //'mater.nama',
            [
                'attribute' => 'tanggal_proses',
                'label' => 'Tanggal Produksi',
            ],
            'jml_transaksi',
            'total_yard_awal',
            [
                'label' => 'Pendapatan',
                'format' => 'raw',
                'value' => function ($data) use ($base) {
                    return $data["total_yard_awal"]*$base;
                },
                'format' => ['currency', 'Rp.'],
                'contentOptions' => ['style' => 'text-align: right;'],
            ],
            /*
            'total_yard_hasil',
            'total_buang',
            [
                'label' => 'Detail',
                'format' => 'raw',
                'value' => function ($data) {
                    //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                    return Html::a(
                        '<i class="fa fa-fw fa-eye"></i>Detail',
                        ['material-in/laporan-bulanan-detail', 'tanggal_proses' => $data["tanggal_proses"]],
                        ['class' => 'btn btn-success btn-sm']
                    );
                }
            ],
            */
            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>