<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleOrder */

//$this->title = $model->id_asset_dismantle_order;

\yii\web\YiiAsset::register($this);
?>
<div class="box2">
    <div class="box-body2 asset-dismantle-order-view">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
         
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
                    'attribute' => 'supervisor',
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
                            return $data->jobclass->job_class;
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
                //'order_increment',
                //'year',
                'notes',
                //'created_date',
                //'created_ip_address',
                
            ],
        ]) ?>

    </div>
</div>
