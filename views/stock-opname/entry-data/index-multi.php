<?php
use yii\helpers\Url;
use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\MaterialSalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Material Sales';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body material-sales-index">


        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control input-lg" id="optEntry" onchange="changeOption()">
                    <option value="bc" <?= ($opt=="bc") ? "selected" : "" ?>>Barcode</option>
                    <option value="kb" <?= ($opt=="kb") ? "selected" : "" ?>>Kode Barang</option>

                    <?php /*
                    <option value="kbp" <?= ($opt=="kbp") ? "selected" : "" ?>>Kode Barang (Pilihan)</option>
                    */ ?>
                </select>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?php if($opt=="bc") { ?>
                <input class="form-control input-lg" type="text" id="txtBarcode" placeholder="Scan barcode produk di sini" onchange="sendMessagePostSession()" maxlength="40">
                <?php } ?>

                <?php if($opt=="kb") { ?>
                <input class="form-control input-lg" type="text" id="txtKodeBarang" placeholder="Ketikkan kode barang di sini" onchange="sendMessagePostKodeBarang()" maxlength="40">
                <?php } ?>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
            <?php //= Html::a('<i class="fa fa-plus input-lg"></i> TAMBAH BARANG', ['create'], ['class' => 'btn btn-warning btn-block input-lg']) ?>
            <button type="submit"  class="btn btn-warning btn-block input-lg" onClickss="sendMessagePostSession()"> <i class="fa fa-plus input-lg"></i> TAMBAH BARANG </button>
            </div>
        </div>
        <div id="msginfo">..</div>

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>
        <?php //\yii\widgets\Pjax::begin(); ?>
        <?php Pjax::begin(['id' => 'pjax_id_1', 'options'=> ['class'=>'pjax', 'loaderId'=>'loader_id_1', 'neverTimeout'=>true]]); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'panel' => ['type' => 'primary', 'heading' => '<span class="fa fa-edit"></span> ' . $this->title],
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
                    'attribute' => 'id_material_finish',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialFinish->mater)) {
                            return $data->materialFinish->mater->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Warna',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialFinish->materialKategori1)) {
                            return $data->materialFinish->materialKategori1->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Jenis',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialFinish->materialKategori2)) {
                            return $data->materialFinish->materialKategori2->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Motif',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialFinish->materialKategori3)) {
                            return $data->materialFinish->materialKategori3->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],

                'redundat_barcode_code',
                'entry_time',
                /*
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
                [
                    'label' => 'Gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->materialFinish->gudang)) {
                            return $data->materialFinish->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                ],
                //'keterangan',
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
                //'status',
                [
                    'attribute' => 'status',
                    'headerOptions' => ['style'=>'text-align:center'],
                    'value' => function ($data) {
                        return $data->status;
                    },
                    'contentOptions' => function ($model, $key, $index, $column) {
                        $color = "";
                        switch($model->status ){
                            case "SESUAI":
                                $color = "green"; break;
                            case "GUDANG TIDAK SESUAI":
                                $color = "red"; break;
                            case "TIDAK DIKENALI":
                                $color = "orange"; break;
                        }
                        
                        return ['style' => 'color: white; background-color:'.$color, 'class' => 'text-left nopadding'];
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_mst_lk_progress', $dataListStatusProgres, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Hapus',
                    'format' => 'raw',

                    'value' => function ($data) use ($i, $g) {
                        //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                        $x = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_stock_opname_item);
                        
                        return Html::a(
                            '<i class="fa fa-fw fa-trash"></i>',
                            ['stock-opname/delete-item', 'x' => $x, 'i' => $i, 'g' => $g],
                            [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'confirm' => 'Anda yakin mau menghapus data ini?',
                                    //'method' => 'post',
                                ],
                                //'onclick'=>'deleteById()'
                            ]
                        );
                    }
                ],
            ],
        ]); ?>

        <?php \yii\widgets\Pjax::end(); ?>
        
    </div>
</div>

<script>
function sendMessagePostSession(){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#txtBarcode" ).val();
  
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("post-message-session/", {msg: newval, iso: <?= $id_stock_opname ?>  , ig: <?= $id_gudang ?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( "Result : " + data );
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        //$("#chatlist" ).append( data );

        //Clear message
        $( "#txtBarcode" ).val("");
        $.pjax.reload({container: '#pjax_id_1', async: false});
      });
    }else{
        $( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
    }
}

function sendMessagePostSessionUnknown(val){
  $( "#msginfo" ).html( "<br>Sedang disimpan...tunggu respon..." );
  var msgText = $( "#txtBarcode" ).val();
  

      var newval = val.replace("/", "****");

      $.post("post-message-session-unknown/", {msg: newval, iso: <?= $id_stock_opname ?>  , ig: <?= $id_gudang ?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( "Result : " + data );
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        //$("#chatlist" ).append( data );

        //Clear message
        $( "#txtBarcode" ).val("");
        $.pjax.reload({container: '#pjax_id_1', async: false});
      });

}

function sendMessagePostKodeBarang(){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#txtKodeBarang" ).val();
  
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("post-message-session-kode-barang/", {msg: newval, iso: <?= $id_stock_opname ?>  , ig: <?= $id_gudang ?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( "Result : " + data );
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        //$("#chatlist" ).append( data );

        //Clear message
        $( "#txtKodeBarang" ).val("");
        $.pjax.reload({container: '#pjax_id_1', async: false});
      });
    }else{
        $( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
    }
}

function sendMessagePostSessionKodeBarangUnknown(val){
  $( "#msginfo" ).html( "<br>Sedang disimpan...tunggu respon..." );
  var msgText = $( "#txtBarcode" ).val();
  

      var newval = val.replace("/", "****");

      $.post("post-message-session-kode-barang-unknown/", {msg: newval, iso: <?= $id_stock_opname ?>  , ig: <?= $id_gudang ?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( "Result : " + data );
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        //$("#chatlist" ).append( data );

        //Clear message
        $( "#txtBarcode" ).val("");
        $.pjax.reload({container: '#pjax_id_1', async: false});
      });

}

function sendMessagePostById(id){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  alert(id);
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon...[Kode: " + id) + "]";
  var msgText = $( "#txtKodeBarang" ).val();
  
    if(id != ""){
      $.post("post-message-session-kode-barang/", {msg: id, iso: <?= $ip ?>}, function(data, status){
        //alert("Saving : " + data + "\nStatus: " + status);
        //$( "#msginfo").text( "Result : " + data );
        //$( "#msginfo").text( data);
        $( "#msginfo").html( data);
        //$("#chatlist" ).append( data );

        //Clear message
        $( "#txtKodeBarang" ).val("");
        $.pjax.reload({container: '#pjax_id_1', async: false});
      });
    }else{
        $( "#msginfo" ).html( "<br><div class='alert alert-danger'>Silakan isi terlebih dahulu!</div>" );
    }
}

function changeOption(){
    var opt = $( "#optEntry" ).val();
    //alert('as' + opt);
    window.location.replace("<?php echo Url::toRoute(['stock-opname/entry-data', 'i'=>$i, 'g'=>$g]); ?>&opt="+opt);
}

function deleteById(){
    alert("Delete");
}
</script>