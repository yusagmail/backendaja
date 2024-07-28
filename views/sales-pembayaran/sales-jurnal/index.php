<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesJurnalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
        maxHeight   : 900,
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
        



<?php
    /*
        $models = $dataProvider->getModels();
        $totalPembayaran = 0;
        $totalKredit = 0; //Total Retur
        foreach ($models as $modelsj) {
            $totalPembayaran = $totalPembayaran + $modelsj->debit;
            $totalKredit = $totalKredit + $modelsj->kredit; //Posisi Kredit untuk Retur
        }
        $totalTagihan = $model->invoice_total; //- $totalKredit;
        $sisa = $totalTagihan - $totalKredit - $totalPembayaran;

        if($sisa > 0){
            
            if($sisa == $model->invoice_total){
                $bgColor = 'red';
                $notes = 'Belum ada pembayaran';
                $model->status_pembayaran = 'BELUM';
            }else{
                $bgColor = 'orange';
                $notes = 'Masih ada kekurangan pembayaran!';
                $model->status_pembayaran = 'PARTIAL';
            }
        }elseif ($sisa == 0) {
            $bgColor = 'green';
            $notes = 'Sudah lunas!';
            $model->status_pembayaran = 'LUNAS';
        }else{
            $bgColor = 'orange';
            $notes = 'Lebih bayar / ada utang ke customer!';
            $model->status_pembayaran = 'LEBIH BAYAR';
        }
        $model->save(false);
        //echo $total;
    */

    $statusPembayaran = \backend\models\SalesJurnal::updateStatusPembayaran($model);
?>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            Status Pembayaran<Br>
            <?php
            echo \backend\models\SalesOrderSearch::getStatusPembayaranView($model);
            ?>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">TOTAL TAGIHAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($statusPembayaran["totalTagihan"]) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
                </div>
            </div>
            <?php
            if($statusPembayaran["totalKredit"] > 0) {
            ?>
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">TOTAL RETUR</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($statusPembayaran["totalKredit"]) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
                </div>
            </div>
            <?php
            }
            ?>
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">TOTAL PEMBAYARAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($statusPembayaran["totalPembayaran"]) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">SISA PEMBAYARAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <div class="small-box bg-<?= $statusPembayaran["bgColor"] ?>">
                    <div class="inner text-right">
                      <h4><?= \common\helpers\ContentStringManipulator::formatRp($statusPembayaran["sisa"]) ?></h4>
                    </div>
                </div>
                <div class="display-1 p-2 mb-2 bg-<?= $statusPembayaran["bgColor"] ?> text-white text-right" style="padding: 3px"><?= $statusPembayaran["notes"] ?></div>
                </div>
            </div>
        </div>
    </div>
        <p>
            <?php 
            if(!$readonly) {
                echo Html::a('Tambah Pembayaran', ['create-pembayaran-bertahap', 'i'=>$i], ['class' => 'btn btn-success']) ;
            }
            ?>
        </p>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
             'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

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
                    'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        return \common\helpers\ContentStringManipulator::formatRp($data->debit);
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'kredit',
                    'format' => 'raw',
                    'contentOptions' => ['class' => 'text-right'],
                    'value' => function ($data) {
                        return \common\helpers\ContentStringManipulator::formatRp($data->kredit);
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                ],
                //'kredit',
                'keterangan',
                //'bayar_cara',
                //'bayar_bukti',
                //'jumlah_bayar',
                //'created_date',
                //'created_user_id',
                //'created_ip_address',
                [
                    'label' => 'Lihat',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                            $it = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_jurnal);
                            return Html::a(
                                '<i class="fa fa-fw fa-eye"></i> Lihat',
                                ['sales-pembayaran/view-item', 'it' => $it],
                                ['class' => 'btn btn-info btn-xs various fancybox.ajax']
                            );
                    }
                ],
                [
                    'label' => 'Edit',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'visible' => !$readonly,
                    'value' => function ($data) use ($i){
                            $it = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_jurnal);
                            return Html::a(
                                '<i class="fa fa-fw fa-pencil"></i> Edit',
                                ['sales-pembayaran/update-item', 'it' => $it, 'i'=>$i],
                                ['class' => 'btn btn-warning btn-xs various fancybox.ajax']
                            );
                    }
                ],
                [
                    'label' => 'Delete',
                    'format' => 'raw',
                    'visible' => !$readonly,
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use ($i){
                            $it = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_jurnal);
                            return Html::a(
                                '<i class="fa fa-fw fa-trash"></i> Del',
                                ['sales-pembayaran/delete-item-pembayaran', 'it' => $it, 'i'=>$i],
                                [
                                'class' => 'btn btn-danger btn-xs',
                                'data' => [
                                    'confirm' => 'Anda yakin mau menghapus data pembayaran ini?',
                                    //'method' => 'post',
                                ],
                            ]
                            );
                    }
                ],
                //['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}'],
            ],
        ]); ?>
    
    
