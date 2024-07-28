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
        $models = $dataProvider->getModels();
        $total = 0;
        foreach ($models as $modelsj) {
            $total = $total + $modelsj->debit - $modelsj->kredit;
        }
        $sisa = $model->invoice_total - $total;

        if($sisa > 0){
            $bgColor = 'red';
            $notes = 'Masih ada kekurangan pembayaran!';
        }elseif ($sisa == 0) {
            $bgColor = 'green';
            $notes = 'Sudah lunas silakan update status menjadi lunas';
        }else{
            $bgColor = 'orange';
            $notes = 'Ada Utang ke customer!';
        }
        //echo $total;
?>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">

        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">TOTAL TAGIHAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($model->invoice_total) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">TOTAL PEMBAYARAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                <input class="form-control input-lg text-right text-bold" value="<?= \common\helpers\ContentStringManipulator::formatRp($total) ?>" id="txtTotalTagihan" type="text" readonly="readonly">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <h4 class="text-right">SISA PEMBAYARAN</h4>
                </div>
                <div class="col-md-6 col-sm-3 col-xs-12">
                    <div class="small-box bg-<?= $bgColor ?>">
                    <div class="inner text-right">
                      <h4><?= \common\helpers\ContentStringManipulator::formatRp($sisa) ?></h4>
                    </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>

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
                //['class' => 'yii\grid\ActionColumn', 'template'=>'{delete}'],
            ],
        ]); ?>
    
    
