<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AssetDismantleReceived */

\yii\web\YiiAsset::register($this);
?>
<div class="box2">
    <div class="box-body2 asset-dismantle-received-view">


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
              
              //'received_date',
                //'notes',
                //'is_approved',
                [
                    'attribute' => 'is_approved',
                    'format' =>'raw',
                    'value' => function($model){

                        switch($model->is_approved ){
                            case 0:
                                return '<span class="label label-success">DITERIMA</span>';
                        }
                    },

                ],
                //'approval_user_id',
                [
                    'attribute' => 'approval_user_id',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->userApproval)) {
                            return $data->userApproval->full_name;
                        } else {
                            return "--";
                        }
                    },
                ],
                'approval_date',
                //'approval_ip_address',
                // [
                //     'attribute' => 'id_warehouse',
                //     'format' => 'raw',
                //     'value' => function ($data) {
                //         if (isset($data->warehouse)) {
                //             return $data->warehouse->nama_warehouse;
                //         } else {
                //             return "--";
                //         }
                //     },
                //     //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                // ],
                
            ],
        ]) ?>

    </div>
</div>
