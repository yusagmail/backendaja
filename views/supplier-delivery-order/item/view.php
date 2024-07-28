<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDoItem */

//$this->title = $model->id_supplier_do_item;
$this->title = 'Detail '.'Supplier Do Item';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Do Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body supplier-do-item-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_supplier_do_item], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_supplier_do_item], [
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
                'varian',
            'qty',
            'unit_price',
            'total_price',
            'keterangan',
            'created_date',
            'created_user_id',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
