<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialInSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekapitulasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-in-index">

    <div class="row">
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $total_yard_awal ?></h3>

              <p>Total Yard Awal</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $total_yard_hasil ?><sup style="font-size: 20px"></sup></h3>

              <p>Total Yard Hasil</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $total_buang ?></h3>

              <p>Total Buang</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <!-- <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
          </div>
        </div>
        <!-- ./col -->
      </div>



        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

        <?php
        $dataListMaterial = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Material::find()
                ->orderBy([
                    'nama' => SORT_ASC
                    ])
                //->where(['id_parent_topnav' => 0])
                ->all(), 'id_material', 'nama');

        $dataListMaterialKategori1 = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori1::find()
                //->where(['id_parent_topnav' => 0])
                ->orderBy([
                    'nama' => SORT_ASC
                    ])
                ->all(), 'id_material', 'nama');

        $dataListMaterialKategori2 = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori2::find()
                //->where(['id_parent_topnav' => 0])
                ->orderBy([
                    'nama' => SORT_ASC
                    ])
                ->all(), 'id_material', 'nama');

        $dataListMaterialKategori3 = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\MaterialKategori3::find()
                //->where(['id_parent_topnav' => 0])
                 ->orderBy([
                    'nama' => SORT_ASC
                    ])
                ->all(), 'id_material', 'nama');

        $dataListSupplier = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Supplier::find()
                //->where(['id_parent_topnav' => 0])
                ->orderBy([
                    'name_company' => SORT_ASC
                    ])
                ->all(), 'id_supplier', 'name_company');


        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
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
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                //'mater.nama',
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mater)) {
                            return $data->mater->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                //'mater.kode',
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                //'mater.kode',
                /*
                [
                    'attribute' => 'id_material',
                    'label' => 'Kode',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->mater)) {
                            return $data->mater->kode;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>false
                ],
                'varian',
                */
                [
                    'attribute' => 'tanggal_proses',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_proses);
                    },
                    'filter'=>dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_proses',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                ],
                'total_yard_awal',
                'total_yard_hasil',
                'total_buang',
                [
                    'label' => 'Selisih Lebih',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $selisih = $data->total_yard_hasil - $data->total_yard_awal;
                        if ($selisih >= 0) {
                            return '<i class="fa fa-caret-up text-green"></i> ' . $selisih;
                        }
                        return '<i class="fa fa-caret-down text-red"></i> ' . $selisih;
                    },
                ],

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>   
</div>