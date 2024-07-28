<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialSalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="box">
    <div class="box-body material-sales-index">

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <div class="row">
            
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="callout callout-info">
                    Silakan isi untuk harga satuan per yard untuk barang yang akan dijual.
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h4 class="text-right">TOTAL TAGIHAN</h4>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($total) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
            </div>
        </div>
        <?php //\yii\widgets\Pjax::begin(); ?>
        <?php Pjax::begin(['id' => 'pjax_id_1', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_1', 'neverTimeout'=>true]]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            //'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
            'export' => false,
            /*
            'export' => [
                'label' => 'Export',
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
            */
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                /*
                'sales_harga_jual',
                'sales_created_date',
                'sales_created_ip_address',
                'yard',
                'kode',
                */
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                //'yard',
                //'year',
                [
                    
                    'attribute' => 'yard',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if ($data->is_join_packing){
                            return $data->yard. '<br>
                            <span class="label label-warning">['.$data->join_info."]</span>";
                        }else{
                            return $data->yard;
                        }
                    },

                ],
                
                
                //'no_urut',
                /*
                'kode',
                'barcode_kode',
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListGudang, ['class' => 'form-control']),
                ],
                */
                //'no_urut_kode',
                //'barcode_kode',
                //'deskripsi',
                //'is_packing',
                //'created_date',
                //'created_ip_address',
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    
                ],
                */
                /*
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {update} {delete} {link}',
                    'buttons' => [
                        'update' => function ($url,$model) {
                            
                            return Html::a(
                                '<span class="glyphicon glyphicon-user"></span>', 
                                $url);
                        },
                        'link' => function ($url,$model,$key) {
                            return Html::a('Action', $url);
                        },
                    ],
                ],
                */
                /*
                [
                    'attribute' => 'id_material_in_item_proc',
                    'header' => 'Sumber Data',
                    'format' => 'raw',
                    'value' => function ($model) {
                        if ($model->id_material_in_item_proc == 0){
                            return '<span class="label label-warning">Ditambahkan Manual</span>';
                        } else {
                            return '<span class="label label-success">Generate dr Produksi</span>';
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_in_item_proc', $dataListSumberData, ['class' => 'form-control']),
                ],
                */
                //'year',
                //'no_urut',
                //'no_urut_kode',
                //'no_splitting',
                //'barcode_kode',
                //'deskripsi',
                //'is_packing',
                //'is_join_packing',
                //'join_info',
                //'created_date',
                //'created_ip_address',

                //['class' => 'yii\grid\ActionColumn'],
                //'sales_harga_jual',
                [
                    'attribute' => 'sales_harga_jual',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_material_sales);
                        $val = $data->sales_harga_jual;
                        return '<input type="text" name="asas" class="form-control" maxlength="12" value="'.$val.'" onchange="sendHargaJual(\''.$i.'\','.$data->yard.')" id="txtHarga_'.$i.'">
                        ';
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                /*
                [
                    'label' => 'status',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_material_sales);
                        return '<div id="msginfo_'.$i.'"></div>
                        ';
                    },
                ],
                */
                [
                    'label' => 'Total Harga',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_material_sales);
                        $total = $data->sales_harga_jual*$data->yard;
                       // return '<div id="totalHarga_'.$i.'">'.number_format($total, 0, ',', '.').'</div>';
                         return '<div id="totalHarga_'.$i.'">'.\common\helpers\ContentStringManipulator::formatRp($total).'</div>';
                    },
                ],

                /*
                [
                    'label' => 'Hapus',
                    'format' => 'raw',

                    'value' => function ($data) use ($ip) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        return Html::a(
                            '<i class="fa fa-fw fa-trash"></i>',
                            ['sales-order/delete-item', 'id_item' => $data->id_material_sales, 'id_parent' => $ip],
                            [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'confirm' => 'Anda yakin mau menghapus data ini?',
                                    //'method' => 'post',
                                ],
                            ]
                        );
                    }
                ],
                */
            ],
        ]); ?>

        <?php \yii\widgets\Pjax::end(); ?>

        <?php /*
            <button type="submit"  class="btn btn-success btn-block input-lg"> <i class="fa fa-save input-lg"></i> SIMPAN & GENERATE INVOICE </button>
        */ ?>
        <?php
            echo Html::a(
                '<i class="fa fa-save input-lg"></i> SIMPAN & GENERATE INVOICE',
                ['sales-invoice/update-invoice', 'i' => $i],
                [
                    'class' => 'btn btn-success btn-block input-lg',
                    'data' => [
                        //'confirm' => 'Anda yakin mau menghapus data ini?',
                        'method' => 'post',
                        'params' => [
                            'invoice'=>'yes',
                            //'param2' => 2,
                        ],
                    ],
                ]);
        ?>
    </div>
</div>

<script>
function sendHargaJual(i,y){
  //alert(i);
  $( "#totalHarga_" + i ).html( "..." );
  var msgText = $( "#txtHarga_" + i ).val();
  //alert(msgText);
  if(msgText != ""){
      var newval = parseInt(msgText);
        if(newval >0){
            var total = newval*y;
            $.post("post-harga-jual/", {msg: newval, i: i, iso: <?= $ip ?>}, function(data, status){
                var fields = data.split('#');
                if(fields.length  > 1){
                    //$( "#totalHarga_" + i ).html( data );
                    $( "#totalHarga_" + i ).html( fields[0] );
                    $( "#txtTotalTagihan").val( fields[1] );
                    
                }
                //$( "#totalHarga_" + i ).html( total );
                //$("#chatlist" ).append( data );

                //Clear message
                //$.pjax.reload({container: '#pjax_id_1', async: false});
            });
        }else{
            alert('Silakan isi dengan angka!');
        }
    }else{
        $( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
    }
}
</script>