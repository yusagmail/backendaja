<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SalesReturSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales Retur';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$dataListPegawai = ['' => 'Pilih'] +  \yii\helpers\ArrayHelper::map(\backend\models\HrmPegawai::find()
        ->orderBy([
            'nama_lengkap' => SORT_ASC
        ])
        ->all(), 'id_pegawai', 'nama_lengkap');

?>
<div class="box">
    <div class="box-body sales-retur-index">

        
        <p>
            <?= Html::a('Tambah Sales Retur', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'tanggal_retur',
                [
                    'attribute' => 'id_penerima_barang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->penerimaBarang)) {
                            return $data->penerimaBarang->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },
                    'filter'=>Html::activeDropDownList($searchModel, 'id_penerima_barang', $dataListPegawai, ['class' => 'form-control']),
                ],
                'alasan_retur',
                'catatan_kondisi_barang',

                [
                    'label' => 'Lihat',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i) {
                            $ir = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_retur);
                            return Html::a(
                                '<i class="fa fa-fw fa-eye"></i> Lihat',
                                ['/sales-retur-cancel/retur-view-item', 'ir' => $ir, 'i'=>$i],
                                ['class' => 'btn btn-info btn-xs various fancybox.ajax']
                            );
                    }
                ],
                [
                    'label' => 'Edit',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i) {
                            $ir = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_retur);
                            return Html::a(
                                '<i class="fa fa-fw fa-pencil"></i> Edit',
                                ['/sales-retur-cancel/update-sales-retur','ir' => $ir, 'i'=>$i],
                                ['class' => 'btn btn-warning btn-xs various fancybox.ajax']
                            );
                    }
                ],

                /*
                [
                    'label' => 'Delete',
                    'format' => 'raw',
                    'value' => function ($data) {
                            $it = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_sales_retur);
                            return Html::a(
                                '<i class="fa fa-fw fa-trash"></i> Del',
                                ['sales-pembayaran/delete-item-pembayaran', 'it' => $it],
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
                */
                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
