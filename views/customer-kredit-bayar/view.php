<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKreditBayar */

//$this->title = $model->id_customer_kredit_bayar;
$this->title = 'Detail '.'Customer Kredit Bayar';
$this->params['breadcrumbs'][] = ['label' => 'Customer Kredit Bayar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-kredit-bayar-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_customer_kredit_bayar], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_kredit_bayar], [
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
                'tanggal_bayar',
            'cara_bayar',
            'jumlah_bayar',
            'status_pembayaran',
            'created_date',
            'created_user_id',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
