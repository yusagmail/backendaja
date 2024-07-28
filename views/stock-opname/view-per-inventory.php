<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Gudang;
use backend\models\GudangSearch;
use kartik\grid\GridView;
/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

//$this->title = $model->id_stock_opname;
$this->title = 'Detail '.'Stock Opname';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body stock-opname-view">

        <?= $this->render('_view_stock_opname', [
            'model' => $model,
        ]) ?>

        <?php
        $searchModel = new GudangSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-check-square"></span> ' . "Silakan Pilih Gudang yang mau dijalankan stockopname"],
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

                'nama_gudang',
                //'kode_gudang',
                'alamat',
                [
                    'label' => 'Status Progres',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i, $id_stock_opname) {
                        $model = \backend\models\StockOpnameStatus::find()->where([
                                'id_stock_opname' => $id_stock_opname,
                                'id_gudang' => $data->id_gudang,
                            ])
                            ->one();
                        if($model != null){
                            switch($model->status ){
                                case "PROGRES":
                                    return '<span class="label label-warning">BELUM SELESAI</span>';
                                case "SELESAI":
                                    return '<span class="label label-success">SELESAI</span>';
                                case "BATAL":
                                    return '<span class="label label-danger">DIBATALKAN</span>';
                            }
                            return "--".$model->status;
                        }else{
                            return "--";
                        }
                    }
                ],
                [
                    'label' => 'Mulai',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i, $id_stock_opname) {
                        $model = \backend\models\StockOpnameStatus::find()->where([
                                'id_stock_opname' => $id_stock_opname,
                                'id_gudang' => $data->id_gudang,
                            ])
                            ->one();
                        if($model != null){
                            if($model->waktu_mulai == 0){
                                return "--";
                            }else{
                                return \common\helpers\Timeanddate::getDateTimeIndo2($model->waktu_mulai);
                            }
                        }else{
                            return "--";
                        }
                    }
                ],
                [
                    'label' => 'Akhir',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i, $id_stock_opname) {
                        $model = \backend\models\StockOpnameStatus::find()->where([
                                'id_stock_opname' => $id_stock_opname,
                                'id_gudang' => $data->id_gudang,
                            ])
                            ->one();
                        if($model != null){
                            if($model->waktu_terakhir == 0){
                                return "--";
                            }else{
                                return \common\helpers\Timeanddate::getDateTimeIndo2($model->waktu_terakhir);
                            }

                        }else{
                            return "--";
                        }
                    }
                ],
                [
                    'label' => 'Jalankan Stock Check',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i) {
                        $g = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_gudang);
                        //$i = $data->id_material_finish;
                        return Html::a(
                            '<i class="fa fa-fw fa-check-square"></i> Jalankan Stock Check',
                            ['stock-opname/entry-data', 'i' => $i, 'g' => $g],
                            ['class' => 'btn btn-warning btn-xs']
                        );

                    
                    }
                ],
                [
                    'label' => 'Hasil Stock Check',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i) {
                        $g = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_gudang);
                        //$i = $data->id_material_finish;
                        return Html::a(
                            '<i class="fa fa-exchange"></i> Hasil',
                            ['stock-opname/hasil-stock-opname', 'i' => $i, 'g' => $g],
                            ['class' => 'btn btn-success btn-xs']
                        );

                    
                    }
                ],
                //'deskripsi',
                //'longitude',
                //'latitude',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>


    </div>
</div>
