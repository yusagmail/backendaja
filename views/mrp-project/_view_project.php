<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-lg-6 col-xs-6">



        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [

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

                //'actual_start_date',
                //'actual_end_date',
            ],
        ]) ?>

    </div>
    <div class="col-lg-6 col-xs-6">



        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                /*
                'project_name',
                'remark:ntext',
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
                */
                'plan_start_date',
                'plan_end_date',
                //'actual_start_date',
                //'actual_end_date',
            ],
        ]) ?>

    </div>
</div>
