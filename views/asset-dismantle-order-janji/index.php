<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetDismantleOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Janji - Bulk Termination';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body asset-dismantle-order-index">
       
       <!-- <p>
            <!-- <?= Html::a('Permintaan Pelanggan', ['create'], ['class' => 'btn btn-success']) ?> 
        </p>   -->
                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                'alamat_customer',
               
                // [
                //     'attribute' => 'id_job_class',
                //     'format' => 'raw',
                //     'value' => function ($data) {
                //         if (isset($data->jobclass)) {
                //             return $data->jobclass->job_class;
                //         } else {
                //             return "--";
                //         }
                //     },
                //     //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                // ],
                [
                    'attribute' => 'id_asset_item',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->assetitem)) {
                            $assetmaster = '';
                            if(isset($data->assetitem->assetMaster)){
                                $assetmaster = $data->assetitem->assetMaster->asset_name;
                            }
                            return $assetmaster." - ".$data->assetitem->number2;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                
                'type_order',
                'order_date',
                [
                    'attribute' => 'id_supervisor',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->supervisor)) {
                            return $data->supervisor->nama_lengkap;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'attribute' => 'id_supervisor',
                    'label' => 'NIK',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->supervisor)) {
                            return $data->supervisor->NIK;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                //'order_number',
                //'order_increment',
                //'year',
                //'notes',
                //'created_date',
                //'created_ip_address',

                ['class' => 'yii\grid\ActionColumn'::className(),'template'=>'{view} {update}'],   
            ],
        ]); ?>
    
    
    </div>
</div>
