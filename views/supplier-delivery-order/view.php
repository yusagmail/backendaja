<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDeliveryOrder */

//$this->title = $model->id_supplier_delivery_order;
$this->title = 'Detail ' . 'Surat Jalan Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Delivery Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body supplier-delivery-order-view">

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_supplier_delivery_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_supplier_delivery_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Kirim Surat', ['kirim'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'nomor_surat_jalan',
                'tanggal_surat_jalan',
                'nomor_invoice',
                'catatan',
            ],
        ]) ?>

    </div>
</div>

<?= $this->render('/supplier-delivery-order/item/index', [
    'searchModel' => $searchModel,
    'dataProvider' => $dataProvider,
    'ip' => $id,
]) ?>