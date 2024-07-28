<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PurchaseRaw */

$this->title = 'Update Pembelian Greige';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Greige', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_purchase_raw, 'url' => ['view', 'id' => $model->id_purchase_raw]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body purchase-raw-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
