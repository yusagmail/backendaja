<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MutasiStockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutasi Stock';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php

$dataListGudang = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()
        //->where(['id_parent_topnav' => 0])
         ->orderBy([
            'nama_gudang' => SORT_ASC
            ])
        ->all(), 'id_gudang', 'nama_gudang');

$dataListPegawai = ['' => 'Pilih'] +  \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()
        ->orderBy([
            'nama_lengkap' => SORT_ASC
        ])
        ->all(), 'id_pegawai', 'nama_lengkap');

?>
<div class="box">
    <div class="box-body mutasi-stock-index">

        
        <p>
            <?= Html::a('Tambah Mutasi Stock', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
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

                    //'tanggal_mutasi',
                    [
                        'attribute' => 'tanggal_mutasi',
                        'format' => 'raw',
                        'value' => function ($data) {
                            return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_mutasi);
                        },
                        'filter'=>dosamigos\datepicker\DatePicker::widget([
                            'model' => $searchModel,
                            'attribute' => 'tanggal_mutasi',
                            'template' => '{addon}{input}',
                            //'options'=>['readonly'=>'readonly'],
                            'clientOptions' => [
                                'autoclose' => true,
                                'format' => 'yyyy-mm-dd',
                                //'endDate' =>date('Y-m-d'),
                            ]
                        ]),
                    ],
                    [
                        'attribute' => 'id_gudang_asal',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->gudangAsal)) {
                                return $data->gudangAsal->nama_gudang;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_gudang_asal', $dataListGudang, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_gudang_tujuan',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->gudangTujuan)) {
                                return $data->gudangTujuan->nama_gudang;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_gudang_tujuan', $dataListGudang, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_pemberi_perintah',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->pemberiPerintah)) {
                                return $data->pemberiPerintah->nama_lengkap;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_pemberi_perintah', $dataListPegawai, ['class' => 'form-control']),
                    ],
                    [
                        'attribute' => 'id_pelaksana_perintah',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->pelaksanaPerintah)) {
                                return $data->pelaksanaPerintah->nama_lengkap;
                            } else {
                                return "--";
                            }
                        },
                        'filter'=>Html::activeDropDownList($searchModel, 'id_pelaksana_perintah', $dataListPegawai, ['class' => 'form-control']),
                    ],
                    'keterangan',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); 
        ?>
    
    
    </div>
</div>
