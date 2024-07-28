<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="box">
    <div class="box-body mrp-project-product-item-index">
        <div class="callout callout-info">
        <p>Nama-nama produk jadi ini diturunkan dari target produk yang ingin dibuat. Silakan pilih salah satu untuk dicek terkait dengan structure produk dan proses yang digunakan</p>
        </div>
        


                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_mst_product_component',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->finalProduct)) {
                            return $data->finalProduct->nama;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                'total_quantity',
                [
                    'label' => 'Struktur Produk',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) use($i){
                        $itr = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_mst_product_component);

                        $button = "";

                        $button .=  Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Struktur Product',
                            ['view-structure-detail', 'i' => $i, 'itr' => $itr,],
                            ['class' => 'btn btn-warning  btn-block']
                        );
                        return $button;
                    
                    }
                ],
                //'plan_start_date',
                //'plan_end_date',
                //'actual_start_date',
                //'actual_end_date',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
