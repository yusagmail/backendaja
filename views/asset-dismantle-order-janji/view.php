<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use common\utils\EncryptionDB;
/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrder */

//$this->title = $model->id_asset_dismantle_order;
$this->title = 'Detail '.'Manajemen Janji';
$this->params['breadcrumbs'][] = ['label' => 'Dismantle Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body asset-dismantle-order-view">

                <p>
            <!-- <?= Html::a('Update', ['update', 'id' => $model->id_asset_dismantle_order], ['class' => 'btn btn-primary']) ?> -->
            <!-- <?= Html::a('Delete', ['delete', 'id' => $model->id_asset_dismantle_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
             ]) ?> -->
             <!-- <?php
            $ic = EncryptionDB::encryptor('encrypt', $model->id_asset_dismantle_order);
            ?>
            <?= Html::a('<i class="fa fa-inbox"></i> Export PDF', ['gen-pdf', 'c' => $ic], [
                'class' => 'btn btn-success',
            ]);
            ?> -->
        </p>
     

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
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
                    'label' => 'Nama Barang',
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
                // [
                //     'attribute' => 'id_supervisor',
                //     'format' => 'raw',
                //     'value' => function ($data) {
                //         if (isset($data->supervisor)) {
                //             return $data->supervisor->NIK;
                //         } else {
                //             return "--";
                //         }
                //     },
                //     //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                // ],
                //'order_number',
                //'order_increment',
                //'year',
                'contact_person',
                'notes',
                'created_date',
                //'created_date',
                //'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
