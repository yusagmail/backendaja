<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseRawItem */

$this->title = 'Update Pembelian Greige Item';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige Item', 'url' => ['/purchase-raw/view?id='.$model->id_purchase_raw]];
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige Item', 'url' => ['view', 'id' => $model->id_purchase_raw_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
    <div class="box-body purchase-raw-item-update">

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>