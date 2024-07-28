<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSales */

//$this->title = $model->id_material_sales;
$this->title = 'Detail '.'Material Sales';
$this->params['breadcrumbs'][] = ['label' => 'Material Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body material-sales-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_material_sales], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_material_sales], [
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
                'sales_harga_jual',
            'sales_created_date',
            'sales_created_ip_address',
            'yard',
            'kode',
            'year',
            'no_urut',
            'no_urut_kode',
            'no_splitting',
            'barcode_kode',
            'deskripsi',
            'is_packing',
            'is_join_packing',
            'join_info',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
