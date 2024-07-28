<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BasicPackingItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Basic Packing Items';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
    <div class="box-body basic-packing-item-index">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Basic Packing Item', ['create-item', 'ip' => $ip], ['class' => 'btn btn-success']) ?>
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

                'id_basic_packing_item',
                // 'id_basic_packing',
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
                //'id_material_support',
                [
                    'attribute' => 'id_material_support',
                    'format' => 'raw',
                    'label' => 'Material Pendukung',
                    'value' => function ($data) {
                        if (isset($data->matsup)) {
                            return $data->matsup->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                'jumlah',
                'keterangan',
                //'created_id_user',
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>