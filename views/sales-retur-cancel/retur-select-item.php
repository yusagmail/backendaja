<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

//$this->title = $model->id_sales_order;
$this->title = 'Pilih Item yang akan diretur';
$this->params['breadcrumbs'][] = ['label' => 'Sales Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-order-view">

        <?php /*
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p> 
        */ ?>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <?= DetailView::widget([
                    'model' => $model,
                    
                    'attributes' => [
                        //'tanggal_order',
                        [
                            'attribute' => 'tanggal_order',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                            },

                        ],
                        'nomor_sales_order',
                        //'nomor',
                        //'month',
                        //'year',
                        /*
                        [   
                            'attribute' => 'id_customer',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->customer)) {
                                    return $data->customer->nama_customer;
                                } else {
                                    return "--";
                                }
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                        ],
                        [   
                            'attribute' => 'id_outlet_penjualan',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->outletPenjualan)) {
                                    return $data->outletPenjualan->nama_outlet;
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        */
                        /*
                        'invoice_total',
                        'bayar_total_bayar',
                        'bayar_cara',
                        'bayar_uang_muka',
                        'bayar_bukti',
                        'status_order',
                        'created_date',
                        'created_ip_address',
                        */
                    ],
                ]) ?>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        //'tanggal_order',
                        /*
                        [
                            'attribute' => 'tanggal_order',
                            'format' => 'raw',
                            'value' => function ($data) {
                                return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_order);
                            },

                        ],
                        'nomor_sales_order',
                        */
                        //'nomor',
                        //'month',
                        //'year',
                        [   
                            'attribute' => 'id_customer',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->customer)) {
                                    return $data->customer->nama_customer;
                                } else {
                                    return "--";
                                }
                            },
                            //'filter' => Html::activeDropDownList($searchModel, 'id_customer', $dataListCustomer, ['class' => 'form-control']),
                        ],
                        [   
                            'attribute' => 'id_outlet_penjualan',
                            'format' => 'raw',
                            'value' => function ($data) {
                                if (isset($data->outletPenjualan)) {
                                    return $data->outletPenjualan->nama_outlet;
                                } else {
                                    return "--";
                                }
                            },

                        ],
                        /*
                        'invoice_total',
                        'bayar_total_bayar',
                        'bayar_cara',
                        'bayar_uang_muka',
                        'bayar_bukti',
                        'status_order',
                        'created_date',
                        'created_ip_address',
                        */
                    ],
                ]) ?>
            </div>
        </div>
        <?php
        if(!$readonly){
            echo $this->render('sales-retur/_step', [
                //'model' => $model,
                'step_ke' => 2, //Step ke-
            ]);
        }
        ?>
    </div>
</div>
    <?php
    if(!$readonly){
    ?>
    <div class="callout callout-info">

        <p>Silakan pilih item barang yang diretur dengan memilih tombol Retur. Barang yang akan diretur akan berpindah pada tabel di paling bawah!
        </p>
    </div>
    <?php
    }else{
    ?>

    <div class="callout callout-info">
        <p>Berikut ini ada 2 tabel. Tabel yang diatas merupakan tabel order sedangkan tabel retur silakan dilihat di bagian bawah
        </p>
    </div>

    <?php
    }
    ?>

<?= $this->render('/sales-retur-cancel/sales-retur-item/index-order', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip'=>$id,
    'i'=>$i,
    'ir'=>$ir,
    'opt'=>$opt,
    'readonly' => $readonly,
]) ?>

<div class="callout callout-warning">
    <h4>Sales Retur Item</h4>

    <p>Data-data terkait Retur dapat dilihat di bagian bawah.
    </p>

</div>
<?php

$searchModel2 = new \backend\models\SalesReturItemSearch();
$searchModel2->retur_id_sales_retur = $id_sales_retur;
$dataProvider2 = $searchModel2->search(Yii::$app->request->queryParams);
$dataProvider2->pagination = false;
//$pagination = 10;

//$dataProvider->sort' => ['defaultOrder' => ['material_in.tanggal_proses' => SORT_DESC]]
$dataProvider2->sort->defaultOrder = ['retur_created_date' => SORT_DESC];

echo $this->render('/sales-retur-cancel/sales-retur-item/index', [
    'searchModel' => $searchModel2,
    'dataProvider' => $dataProvider2,
    'ip'=>$id,
    'i'=>$i,
    'ir'=>$ir,
    'opt'=>$opt,
    'readonly' => $readonly,
]) ;

//Dapatkan rekap pembayarannya
$models = $dataProvider2->getModels();
$total= 0;
foreach ($models as $modelsri) {
    //echo $model->sales_harga_jual." <br>";
    $total += $modelsri->sales_harga_jual*$modelsri->yard;
}
//echo $total;
$modelRetur->total_tagihan_retur = $total;
$modelRetur->save(false);

//Simpan ke SalesJurnal
\backend\models\SalesJurnal::saveReturSales($model, $id_sales_retur, $total);

?>