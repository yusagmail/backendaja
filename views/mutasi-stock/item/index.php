<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MutasiStockItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutasi Stock Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mutasi-stock-item-index">

        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <select class="form-control input-lg" id="optEntry" onchange="changeOption()">
                    <option value="bc" <?= ($opt=="bc") ? "selected" : "" ?>>Barcode</option>
                    <option value="kb" <?= ($opt=="kb") ? "selected" : "" ?>>Kode Barang</option>
                    <!-- <option>Barcode</option>
                    <option>Kode Barang</option>
                    <option>Kode Barang (Pilihan)</option> -->

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
        <p>
            <?php //= Html::a('Tambah Barang', ['create-item', 'ip'=>$ip], ['class' => 'btn btn-success btn-sm']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
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
                    [
                        'attribute' => 'id_material_finish',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish)) {
                                return $data->materialFinish->kode;
                            } else {
                                return "--";
                            }
                        },

                    ],
                    [
                        //'attribute' => 'id_material',
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
                        //'attribute' => 'id_material_kategori1',
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
                        //'attribute' => 'id_material_kategori2',
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
                        //'attribute' => 'id_material_kategori3',
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
                    //'yard',
                    [
                        
                        //'attribute' => 'yard',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish)) {
                                if ($data->materialFinish->is_join_packing){
                                    return $data->materialFinish->yard. '<br>
                                    <span class="label label-warning">['.$data->materialFinish->join_info."]</span>";
                                }else{
                                    return $data->materialFinish->yard;
                                }
                            }else{
                                return "--";
                            }
                        },

                    ],

                    [
                        'label' => 'Hapus',
                        'format' => 'raw',

                        'value' => function ($data) use ($ip) {
                            //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                            return Html::a(
                                '<i class="fa fa-fw fa-trash"></i>',
                                ['mutasi-stock/delete-item', 'id_item' => $data->id_mutasi_stock_item, 'id_parent' => $ip],
                                [
                                    'class' => 'btn btn-danger btn-xs',
                                    'data' => [
                                        'confirm' => 'Anda yakin mau menghapus data mutasi ini?',
                                        //'method' => 'post',
                                    ],
                                ]
                            );
                        }
                    ],
                    //'keterangan',

                    //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php \yii\widgets\Pjax::end(); ?>
        <div class="callout callout-warning">
            <h4>Cetak Surat Jalan</h4>

            <p>Pastikan data-data sudah lengkap dan benar. Jika anda sudah cetak surat jalan maka sudah tidak bisa diubah lagi</p>

            <?= Html::a('Cetak Surat Jalan', ['cetak-surat-jalan', 'ip'=>$ip], ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

    </div>
</div>
<script>
function sendMessagePostSession(){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#txtBarcode" ).val();
  
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("post-message/", {msg: newval, iso: <?= $ip ?>}, function(data, status){
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

function sendMessagePostKodeBarang(){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon..." );
  var msgText = $( "#txtKodeBarang" ).val();
  
  if(msgText != ""){
      var newval = msgText.replace("/", "****");

      $.post("post-message-kode-barang/", {msg: newval, iso: <?= $ip ?>}, function(data, status){
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

function sendMessagePostById(id){
  //$( "#msginfo" ).text( "Sedang dikirim...tunggu respon..." );
  alert(id);
  $( "#msginfo" ).html( "<br>Sedang dikirim...tunggu respon...[Kode: " + id) + "]";
  var msgText = $( "#txtKodeBarang" ).val();
  
    if(id != ""){
      $.post("post-message-kode-barang/", {msg: id, iso: <?= $ip ?>}, function(data, status){
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
    window.location.replace("<?php echo Url::toRoute(['mutasi-stock/view', 'id'=>$id]); ?>&opt="+opt);
}
</script>