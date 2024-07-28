<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDeliveryOrder */

$this->title = 'Tambah Surat Jalan Supplier';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Delivery Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body supplier-delivery-order-create">


		<?= $this->render('_form', [
			'model' => $model,
		]) ?>

	</div>
</div>