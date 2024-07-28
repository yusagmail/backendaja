<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\MstProductComponent */

//$this->title = $model->id_mst_product_component;
$this->title = 'Detail '.'Mst Product Component';
$this->params['breadcrumbs'][] = ['label' => 'Mst Product Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body mst-product-component-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_mst_product_component], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_mst_product_component], [
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
                'kode',
            'nama',
            'no_urut',
            'no_urut_kode',
            'barcode_kode',
            'deskripsi',
            'is_finish_product',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
