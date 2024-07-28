<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemProductComponent */

//$this->title = $model->id_item_product_component;
$this->title = 'Detail '.'Item Product Component';
$this->params['breadcrumbs'][] = ['label' => 'Item Product Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body item-product-component-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_item_product_component], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_item_product_component], [
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
                'kode_item',
            'nama_item',
            'no_urut',
            'no_urut_kode',
            'barcode_item_kode',
            'catatan',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
