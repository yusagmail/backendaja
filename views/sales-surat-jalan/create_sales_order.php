<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

$this->title = 'Tambah Sales Order';
$this->params['breadcrumbs'][] = ['label' => 'Sales Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sales-order-create">

		
	    <?= $this->render('_form_sales_order', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
