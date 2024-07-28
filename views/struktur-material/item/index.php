<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PurchaseRawItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Struktur Material Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body struktur-material-item-index">

        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Struktur Material Item', ['create-item', 'ip' => $ip], ['class' => 'btn btn-success']) ?>
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
                [
                    'attribute' => 'id_material_raw_kategori',
                    'format' => 'raw',
                    'label' => 'Material Raw Kategori',
                    'value' => function ($data) {
                        if (isset($data->materialRawKategori)) {
                            return $data->materialRawKategori->nama;
                        } else {
                            return "--";
                        }
                    },
                ],
                //'created_id_user',
                //'created_date',
                //'created_ip_address',

                [
                    'class' => 'yii\grid\ActionColumn',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'view') {
                            $url = Url::base() . '/struktur-material-item/view?id=' . $model->id_struktur_material_item;
                            return $url;
                        }

                        if ($action === 'update') {
                            $url = Url::base() . '/struktur-material-item/update?id=' . $model->id_struktur_material_item;
                            return $url;
                        }
                        if ($action === 'delete') {
                            $url = Url::base() . '/struktur-material-item/delete?id=' . $model->id_struktur_material_item;
                            return $url;
                        }
                    }
                ],
            ],
        ]); ?>

    </div>
</div>