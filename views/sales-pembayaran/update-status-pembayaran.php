<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

$this->title = 'Update Status Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Sales Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sales_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sales-order-update">

		
	    <?= $this->render('_form_status_pembayaran', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
