<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\StockOpnameSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stock Opname';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body stock-opname-index">

        
        <p>
            <?= Html::a('Tambah Stock Opname', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

               //'tanggal_stock_opname',
                [
                    'attribute' => 'tanggal_stock_opname',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->tanggal_stock_opname);
                    },
                    'filter'=>dosamigos\datepicker\DatePicker::widget([
                        'model' => $searchModel,
                        'attribute' => 'tanggal_stock_opname',
                        'template' => '{addon}{input}',
                        //'options'=>['readonly'=>'readonly'],
                        'clientOptions' => [
                            'autoclose' => true,
                            'format' => 'yyyy-mm-dd',
                            //'endDate' =>date('Y-m-d'),
                        ]
                    ]),
                ],
                'nama_kegiatan',
                'keterangan',
                [
                    'label' => 'Jalankan StockOp',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_stock_opname);

                        return Html::a(
                            '<i class="fa fa-fw fa-check-square"></i> Jalankan',
                            ['view-per-inventory', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs btn-block']
                        );

                    
                    }
                ],
                //'created_date',
                //'created_user_id',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
