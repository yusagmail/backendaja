<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PurchaseOrderItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Purchase Order Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body purchase-order-item-index">

        
<div class="purchase-order-item-form">
    <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
        'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                [
                    'attribute' => 'Nama Barang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->defectaDetails)) {
                            return $data->defectaDetails->assetMaster->asset_name;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'Satuan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->defectaDetails)) {
                            return $data->defectaDetails->mstSatuan->satuan;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'Perkiraan Stok',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->defectaDetails)) {
                            return $data->defectaDetails->id_mst_satuan;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'Konsumsi (Perbulan)',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->defectaDetails)) {
                            return $data->defectaDetails->id_mst_satuan;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_gudang', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'Stok',
                    'format' => 'raw',
                    'value' => function ($data) {
                        // Tampilkan input text untuk setiap baris dengan nilai dari atribut 'nama_atribut'
                        return '<input type="text" class="data-stok" data-stock="' . $data->id_defecta_details . '" value="'.$data->stok.'">';
                    },
                ],
                [
                    'attribute' => 'Harga Beli',
                    'format' => 'raw',
                    'value' => function ($data) {
                        // Tampilkan input text untuk setiap baris dengan nilai dari atribut 'nama_atribut'
                        return '<input type="text" class="data-cost" data-cost="' . $data->id_defecta_details . '" value="'.$data->cost.'">';
                    },
                ],
                [
                    'attribute' => 'Keuntungan per Satuan (%)',
                    'format' => 'raw',
                    'value' => function ($data) {
                        // Tampilkan input text untuk setiap baris dengan nilai dari atribut 'nama_atribut'
                        return '<input type="text" lass="data-sales" data-sales="' . $data->id_defecta_details . '" value="'.$data->sales.'">';
                    },
                ],
                [
                    'attribute' => 'Total Harga',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $total_harga=$data->stok*$data->cost;
                        // Tampilkan input text untuk setiap baris dengan nilai dari atribut 'nama_atribut'
                        return $total_harga;
                    },
                ],
                [
                    'attribute' => 'Total Harga Jual',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $total_jual=($data->sales/100*$data->cost)+$data->cost;
                        // Tampilkan input text untuk setiap baris dengan nilai dari atribut 'nama_atribut'
                        return $total_jual;
                    },
                ],

            ],
        ]); ?>


    <div class="form-group">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Simpan
    </button>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Pastikan semua data yang telah ada masukkan benar dan tepat
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batalkan</button>
        <button type="btn btn-primary" class= "btn btn-primary" onClick="window.location.reload()">Ya,Simpan</button>
      </div>
    </div>
  </div>
</div>
</div>
    
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[data-stock]').on('change', function() {
            //var id = $(this).data('id_defecta_details');
            var id = $(this).data('stock');
            var stok = $(this).val();
            console.log(stok);
            console.log(id);
            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('/plan/ajax-action') ?>", // Gunakan tanda petik ganda
                method: 'POST',
                data: {
                    id_defecta_details: id,
                    stok: stok,
                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        
        });

        $('input[data-cost]').on('change', function() {
            //var id = $(this).data('id_defecta_details');
            var id = $(this).data('cost');
            var cost = $(this).val();
            console.log(cost);
            console.log(id);
            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('/plan/ajax-action') ?>", // Gunakan tanda petik ganda
                method: 'POST',
                data: {
                    id_defecta_details: id,
                    cost: cost,
                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        
        });

        $('input[data-sales]').on('change', function() {
            //var id = $(this).data('id_defecta_details');
            var id = $(this).data('sales');
            var cost = $(this).val();
            console.log(sales);
            console.log(id);
            // Kirim data melalui Ajax
            $.ajax({
                url: "<?php echo Yii::$app->urlManager->createUrl('/plan/ajax-action') ?>", // Gunakan tanda petik ganda
                method: 'POST',
                data: {
                    id_defecta_details: id,
                    sales: sales,
                },
                success: function(response) {
                    console.log(response); // Tampilkan respons di console
                    // Lakukan sesuatu setelah data berhasil dikirim
                },
                error: function(xhr, status, error) {
                    // console.log(xhr.responseText); // Tampilkan pesan kesalahan di console
                    // Tangani kesalahan jika terjadi
                }
            });
        
        });
});

</script>