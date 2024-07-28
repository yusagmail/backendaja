<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\BankPembayaran */

//$this->title = $model->id_bank_pembayaran;
$this->title = 'Detail '.'Bank Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Bank Pembayaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body bank-pembayaran-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_bank_pembayaran], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_bank_pembayaran], [
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
                'nama_bank',
            'nama_bank_short',
            'nomor_rekening',
            'atas_nama',
            'kode',
            ],
        ]) ?>

    </div>
</div>
