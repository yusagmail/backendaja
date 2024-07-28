<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StrukturMaterialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$title = "Barang Jadi Dari Greige";
$this->title = $title;
$this->params['breadcrumbs'][] = $this->title;


?>
<div class="box">
    <div class="box-body struktur-material-index">
            <div class="callout callout-info">
                <h4>Petunjuk</h4>

                <p>Fitur ini digunakan untuk memetakan bahwa barang jadi tertentu dibuat dari greige yang mana.</p>
            </div>
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah '.$title, ['create'], ['class' => 'btn btn-success']) ?>
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

                // 'id_struktur_material',
                // 'id_material',
                [
                    'attribute' => 'id_material',
                    'format' => 'raw',
                    'label' => 'Material',
                    'value' => function ($data) {
                        if (isset($data->material)) {
                            return $data->material->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori1',
                [
                    'attribute' => 'id_material_kategori1',
                    'format' => 'raw',
                    //'label' => 'Material Kategori 1',
                    'value' => function ($data) {
                        if (isset($data->materialKategori1)) {
                            return $data->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori2',
                [
                    'attribute' => 'id_material_kategori2',
                    'format' => 'raw',
                    //'label' => 'Material Kategori 2',
                    'value' => function ($data) {
                        if (isset($data->materialKategori2)) {
                            return $data->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                // 'id_material_kategori3',
                [
                    'attribute' => 'id_material_kategori3',
                    'format' => 'raw',
                    //'label' => 'Material Kategori 3',
                    'value' => function ($data) {
                        if (isset($data->materialKategori3)) {
                            return $data->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                [
                    'attribute' => 'id_material_raw_kategori',
                    'format' => 'raw',
                    //'label' => 'Material Kategori 3',
                    'value' => function ($data) {
                        $items = $data->getListItemTarget();
                        $list = '';
                        foreach($items as $item){
                            //$list .= $item->materialRawKategori->nama."; ";
                            if($item->materialRawKategori){
                                $list .= $item->materialRawKategori->nama;
                            }
                        }

                        return $list;
                    },
                ],
                //'created_id_user',
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>