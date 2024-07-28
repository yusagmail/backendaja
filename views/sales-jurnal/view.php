<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnal */

//$this->title = $model->id_sales_jurnal;
$this->title = 'Detail '.'Sales Jurnal';
$this->params['breadcrumbs'][] = ['label' => 'Sales Jurnal', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-jurnal-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_jurnal], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_jurnal], [
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
                'type',
            'tanggal',
            'debit',
            'kredit',
            'keterangan',
            'bayar_cara',
            'bayar_bukti',
            'jumlah_bayar',
            'created_date',
            'created_user_id',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
