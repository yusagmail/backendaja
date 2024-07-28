<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialSampelSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Material Sampel';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php

$dataListCustomer = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Customer::find()
        //->where(['id_parent_topnav' => 0])
         ->orderBy([
            'nama_customer' => SORT_ASC
            ])
        ->all(), 'id_customer', 'nama_customer');

$listMateialRawKategori = ['' => 'Pilih'] +  \yii\helpers\ArrayHelper::map(\backend\models\MaterialRawKategori1::find()
        ->orderBy([
            'nama' => SORT_ASC
        ])
        ->all(), 'id_material_raw_kategori', 'nama');

$listSubcontractor = ['' => 'Pilih'] +  \yii\helpers\ArrayHelper::map(\backend\models\Subcontractor::find()
        ->orderBy([
            'nama_subcontractor' => SORT_ASC
        ])
        ->all(), 'id_subcontractor', 'nama_subcontractor');

?>
<div class="box">
    <div class="box-body material-sampel-index">
            <div class="callout callout-info">
               

                <p>Fitur ini digunakan untuk membuat produk sampel jadi dari sebuah greige.</p>
              </div>
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Material Sampel', ['create'], ['class' => 'btn btn-success']) ?>
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

                // 'id_material_sampel',
                // 'id_customer',
                [
                    'attribute' => 'id_customer',
                    'format' => 'raw',
                    'label' => 'Customer',
                    'value' => function ($data) {
                        if (isset($data->customer)) {
                            return $data->customer->nama_customer;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                ],
                'nama_sampel',
                // 'id_material_raw_kategori',
                [
                    'attribute' => 'id_material_raw_kategori',
                    'format' => 'raw',
                    //'label' => 'Material Raw Kategori',
                    'value' => function ($data) {
                        if (isset($data->materialRawKategori)) {
                            return $data->materialRawKategori->nama;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_material_raw_kategori', $listMateialRawKategori, ['class' => 'form-control']),
                ],
                'tanggal_minta_sampel',
                'tanggal_keluar_sampel',
                //'id_subcontractor',
                [
                    'attribute' => 'id_subcontractor',
                    'format' => 'raw',
                    'label' => 'Subcontractor',
                    'value' => function ($data) {
                        if (isset($data->subcontractor)) {
                            return $data->subcontractor->nama_subcontractor;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_subcontractor', $listSubcontractor, ['class' => 'form-control']),
                ],
                //'id_material',
                //'id_material_kategori1',
                //'id_material_kategori2',
                //'id_material_kategori3',
                //'kode_barcode',
                //'keterangan',
                'status',
                //'created_id_user',
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>