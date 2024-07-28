<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialFinishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Konsolidasi - Barang Duplicate Barcode';
$this->params['breadcrumbs'][] = $this->title;
?>





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

$dataListGudang = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Gudang::find()
        //->where(['id_parent_topnav' => 0])
         ->orderBy([
            'nama_gudang' => SORT_ASC
            ])
        ->all(), 'id_gudang', 'nama_gudang');

$dataListSumberData = ['' => 'Pilih'] + ['0' => 'Manual Input', '1' => 'Generate dr Produksi'];
/*
$dataListSupplier = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\Supplier::find()
        //->where(['id_parent_topnav' => 0])
        ->orderBy([
            'name_company' => SORT_ASC
            ])
        ->all(), 'id_supplier', 'name_company');
        */
?>

<?php
$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/plugins/fancybox/jquery.fancybox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<?php
$this->registerJs(
    '  
    $(".various").fancybox({
        maxWidth    : 800,
        maxHeight   : 700,
        fitToView   : false,
        // width        : "70%",
        // height       : "70%",
        autoSize    : true,
        closeClick  : false,
        openEffect  : "none",
        closeEffect : "none"
    });
        '
);
?>
<div class="box">
    <div class="box-body material-finish-index">
    <div style="overflow-x: auto; width: 100%;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['style' => ['font-size'=>'12px']],
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

                'barcode_kode',

                [
                    'label' => 'Jumlah Kode Yang Sama',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        return \common\helpers\ContentStringManipulator::formatRp($data["jumlah"]);
                    },
                ],
                [
                    'label' => 'Cek Duplicate',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        //$i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_mutasi_stock);
                        //$i = $data->id_material_finish;
                        return Html::a(
                            '<i class="fa fa-fw fa-pencil"></i> Cek Duplicate',
                            ['material-konsolidasi/list-by-barcode', 'bc' => $data->barcode_kode],
                            ['class' => 'btn btn-warning btn-xs']
                        );

                    
                    }
                ],

                /*
                [
                    'label' => 'Regenerate Barcode',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        //$i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_mutasi_stock);
                        $i = $data->id_material_finish;
                        return Html::a(
                            '<i class="fa fa-fw fa-print"></i>Re-Generate',
                            ['material-konsolidasi/regenerate', 'id' => $i],
                            ['class' => 'btn btn-danger btn-xs various fancybox.ajax']
                        );

                    
                    }
                ],
                */
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'header' => 'Aksi',
                    'buttons' => [
                        'update' => function ($url,$model) {
                            if ($model->id_material_in_item_proc == 0){
                                return Html::a(
                                '<span class="glyphicon glyphicon-pencil"></span>', 
                                $url);
                            }else{
                                return "";
                            }
                        },
                        'delete' => function ($url,$model) {
                            if ($model->id_material_in_item_proc == 0){
                                return Html::a('', $url,
                                  [
                                     'data' => [
                                         'method' => 'post',
                                          // use it if you want to confirm the action
                                          'confirm' => 'Are you sure?',
                                      ],
                                      'class' => 'glyphicon glyphicon-trash'
                                   ]
                                 );

                                return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>', 
                                $url);
                                return ( Html::a('<span class="glyphicon glyphicon-trash"></span>', true, ['class' => 'ajaxDelete', 'delete-url' => $url, 'pjax-container' => 'pjax-list', 'title' => Yii::t('app', 'Delete'), 'data-pjax' => '0']));
                            }else{
                                return "";
                            }
                        },
                    ],
                ],
                */
            ],
        ]); ?>
    </div>

    </div>
</div>