<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerKredit */

//$this->title = $model->id_customer_kredit;
$this->title = 'Detail '.'Customer Kredit';
$this->params['breadcrumbs'][] = ['label' => 'Customer Kredit', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-kredit-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_customer_kredit], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_customer_kredit], [
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
                'jumlah_kredit',
            'tanggal',
            ],
        ]) ?>

    </div>
</div>
