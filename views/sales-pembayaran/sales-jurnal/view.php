<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnal */

//$this->title = $model->id_sales_jurnal;
$this->title = 'Detail '.'Sales Jurnal';
$this->params['breadcrumbs'][] = ['label' => 'Sales Jurnal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$basepath = Yii::$app->request->baseUrl;
?>
<div class="box">
    <div class="box-body sales-jurnal-view">



        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'type',
                'type',
                //'tanggal',
                [
                    'attribute' => 'tanggal',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal);
                    },
                    /*
                    'filter' => dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                    */
                ],
                'bayar_cara',
                //'debit',
                [
                    'attribute' => 'debit',
                    'format' => 'raw',
                    //'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        return \common\helpers\ContentStringManipulator::formatRp($data->debit);
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'kredit',
                    'format' => 'raw',
                    //'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        return \common\helpers\ContentStringManipulator::formatRp($data->kredit);
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                //'kredit',
                'keterangan',
                //'created_date'
                [
                    'attribute' => 'created_date',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getDateTimeIndo($data->created_date);
                    },
                    /*
                    'filter' => dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_order',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                    */
                ],
                [
                    'attribute' => 'bayar_bukti',
                    'format' => 'raw',
                    'value' => function ($data) use ($basepath) {
                        $imgpath = $data->bayar_bukti;
                        if ($data->bayar_bukti != "") {
                            //return '<img class="img-responsive" width="100px" src="' . $basepath . '/uploads/galery/' . $imgpath . '" alt="Foto"/>';
                            return '<img src="'.$basepath.'/file/bayar_bukti/'.$imgpath.'" class="img-responsive" width="300px" alt="Foto"> ';
                        } else {
                            return "No Image";
                        }
                    }
                ],
            ],
        ]) ?>

    </div>
</div>
