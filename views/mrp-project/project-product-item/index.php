<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectProductItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Target Product';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mrp-project-product-item-index">
        <div class="callout callout-info">
        <p>Silakan tambahkan produk hasil (finish good) yang ingin dihasilkan. Jika ada split target secara waktu, isikan beberapa kali dengan start date dan end date yang berbeda.</p>
        </div>
        
        <p>
            <?= Html::a('<i class="fa fa-plus"></i> Tambah Product Target', ['create-product-target', 'p'=>$i], ['class' => 'btn btn-success btn-xs']) ?>
        </p>

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
                'quantity',
                //'plan_start_date',
                [
                    'attribute' => 'plan_start_date',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->plan_start_date);
                    },
                ],
                //'plan_end_date',
                [
                    'attribute' => 'plan_end_date',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return common\helpers\Timeanddate::getShortDateIndo($data->plan_end_date);
                    },
                ],
                //'actual_start_date',
                //'actual_end_date',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
