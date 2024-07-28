<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MrpProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mrp-project-index">

        
        <p>
            <?= Html::a('Tambah Project', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'project_name',
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                ],
                //'remark:ntext',
                //'is_internal_order',
                [
                    'attribute' => 'is_internal_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusInternalOrder();
                    },

                ],
                //'is_main_order',
                [
                    'attribute' => 'is_main_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->getStatusMainOrder();
                    },

                ],
                /*
                [
                    'attribute' => 'plan_start_date',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return $data->plan_start_date;
                    },

                ],
                */
                [
                    'label' => 'Rencana Pelaksanaan',
                    'format' => 'raw',
                    'value' => function ($data) {
                        $view =  "Start: ".$data->plan_start_date;
                        $view .= '<br>';
                        $view .=  "End : ".$data->plan_end_date;

                        return $view;
                    },

                ],
                [
                    'label' => 'Rancangan Struktur',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_mrp_project);

                        $button = "";
                        $button .=  Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Target Product',
                            ['view-product', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs btn-block']
                        );
                        $button .=  Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Struktur Product',
                            ['view-structure', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs btn-block']
                        );
                        return $button;
                    
                    }
                ],
                //'plan_start_date',
                //'plan_end_date',
                //'actual_start_date',
                //'actual_end_date',

                [
                    'header'=> 'Aksi',
                    'class' => 'yii\grid\ActionColumn'
                ],
            ],
        ]); ?>
    
    
    </div>
</div>
