<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SupplierDeliveryOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Surat Jalan Supplier';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$dataListSupplier = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Supplier::find()
    //->where(['id_parent_topnav' => 0])
    ->orderBy([
        'name_company' => SORT_ASC
    ])
    ->all(), 'id_supplier', 'name_company');
?>
<div class="box">
    <div class="box-body supplier-delivery-order-index">


        <p>
            <?php //= Html::a('Tambah Surat Jalan Supplier', ['create'], ['class' => 'btn btn-success']) 
            ?>
        </p>
        <div class="alert alert-info">Berikut ini merupakan list surat jalan.
            Data surat jalan akan dimasukkan ketika barang diterima.
        </div>
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

                'nomor_surat_jalan',
                [
                    'attribute' => 'id_supplier',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->supplier)) {
                            return $data->supplier->name_company;
                        } else {
                            return "--";
                        }
                    },
                    'filter' => Html::activeDropDownList($searchModel, 'id_supplier', $dataListSupplier, ['class' => 'form-control']),
                ],
                //'tanggal_surat_jalan',
                [
                    'attribute' => 'tanggal_surat_jalan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_surat_jalan);
                    },
                    'filter' => dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_surat_jalan',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                ],
                'nomor_invoice',
                'catatan',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>