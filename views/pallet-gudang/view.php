<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\PalletGudang */

//$this->title = $model->id_pallet_gudang;
$this->title = 'Detail '.'Pallet Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Pallet Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body pallet-gudang-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_pallet_gudang], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_pallet_gudang], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'id_gudang',
                    'format' => 'raw',
                    'value' => function ($data) {
                        if (isset($data->gudang)) {
                            return $data->gudang->nama_gudang;
                        } else {
                            return "--";
                        }
                    },
                ],
                'nomor_pallet',
                'kode',
                'pallet_group',
                'keterangan',
            ],
        ]) ?>

    </div>
</div>
