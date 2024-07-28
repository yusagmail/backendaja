<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */


?>
<div class="user-view box box-primary">

    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                'full_name',
                'username',
                'email:email',
//                'password_hash',
//                'auth_key',
//                'status',
//                'password_reset_token',
                //'user_level',
                [
                    'attribute' => 'user_level',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        return $data->userLevel;
                    },

                ],
                [
                    'label' => 'Keterangan',
                    'format' => 'raw',
                    //'value' => function ($data) use ($ip) {
                    'value' => function ($data) {
                        if($data->user_level == "sales"){
                            if (isset($data->outletPenjualanInduk)) {
                                return "OUTLET : ".$data->outletPenjualanInduk->nama_outlet;
                            } else {
                                return "--";
                            }
                        }

                        if($data->user_level == "warehouse"){
                            if (isset($data->gudangInduk)) {
                                return "GUDANG : ".$data->gudangInduk->nama_gudang;
                            } else {
                                return "--";
                            }
                        }

                        return "--";
                    },
                ],
//                'role',
                //'created_at:datetime',
                //'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
