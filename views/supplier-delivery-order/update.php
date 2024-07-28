<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDeliveryOrder */

$this->title = 'Update Surat Jalan Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Delivery Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_supplier_delivery_order]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body supplier-delivery-order-update">


		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>
</div>