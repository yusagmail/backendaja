<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\JPembelian */

//$this->title = $model->id_j_pembelian;
$this->title = 'Detail '.'J Pembelian';
$this->params['breadcrumbs'][] = ['label' => 'J Pembelian', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body jpembelian-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_j_pembelian], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_j_pembelian], [
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
                'jumlah',
            'total_biaya',
            'no_bukti',
            'tanggal_pembelian',
            'bulan',
            'tahun',
            ],
        ]) ?>

    </div>
</div>
