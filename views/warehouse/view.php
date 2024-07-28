<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Warehouse */

$this->title = $model->id_warehouse;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warehouse-view box box-primary">
    <div class="box-header">
        <?= Html::a('Update', ['update', 'id_warehouse' => $model->id_warehouse], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a('Delete', ['delete', 'id_warehouse' => $model->id_warehouse], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id_warehouse',
                'nama_warehouse',
                'alamat',
                'deskripsi',
                'longitude',
                'latitude',
                'id_witel',
            ],
        ]) ?>
    </div>
</div>
