<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AssetDismantleOrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pencabutan';
$this->params['breadcrumbs'][] = $this->title;
?>


<?php
    $dataListUser = ['' => 'Pilih'] + \yii\helpers\ArrayHelper::map(\backend\models\User::find()
        //->where(['user_level' => 'operator'])
        ->all(), 'id', 'full_name');
?>
<div class="box">
    <div class="box-body asset-dismantle-order-index">



                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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
                    'label' => 'ID Pegawai',
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
                [
                    'attribute' => 'id_job_class',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->jobclass)) {
                            return $data->jobclass->namajob_class;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
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
                'type_order',
                'order_date',
                //'order_number',
                [
                    'attribute' => 'id_mst_status_dismantle_order',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->statusDismantleOrder)) {
                            return $data->statusDismantleOrder->status_dismantle_order;
                        } else {
                            return "--";
                        }
                    },
                    //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                ],
                [
                    'label' => 'Pencabutan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_asset_dismantle_order);

                        return Html::a(
                            '<i class="fa fa-fw fa-check-square"></i> Mencabut',
                            ['received', 'i' => $i],
                            ['class' => 'btn btn-success btn-xs btn-block']
                        );

                    
                    }
                ],
                [
                    'label' => 'Cek Laporan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        $i = \common\utils\EncryptionDB::encryptor('encrypt',$data->id_asset_dismantle_order);

                        return Html::a(
                            '<i class="fa fa-fw fa-eye"></i> Cek laporan',
                            ['view', 'i' => $i],
                            ['class' => 'btn btn-warning btn-xs btn-block']
                        );

                    
                    }
                ],
                //'order_increment',
                //'year',
                //'notes',
                //'created_date',
                //'created_ip_address',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    
    
    </div>
</div>
