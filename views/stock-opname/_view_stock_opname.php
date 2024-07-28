<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

\yii\web\YiiAsset::register($this);
?>


        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'tanggal_stock_opname',
                [
                    'attribute' => 'tanggal_stock_opname',
                    'format' => 'raw',
                    'value' => function ($data) {
                        return \common\helpers\Timeanddate::getShortDateIndo($data->tanggal_stock_opname);
                    },
                ],
                'nama_kegiatan',
                'keterangan',
                /*
                'created_date',
                'created_user_id',
                'created_ip_address',
                */
            ],
        ]) ?>

