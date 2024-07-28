<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesRetur */

$this->title = 'Tambah Sales Retur';
$this->params['breadcrumbs'][] = ['label' => 'Sales Retur', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body sales-retur-create">
	    <?= $this->render('_view_sales_order_short', [
	        //'model' => $model,
	        'model' => $model_so,
	    ]) ?>
		
	    <?php
		
		echo $this->render('sales-retur/_step', [
	        //'model' => $model,
			'step_ke' => 1, //Step ke-
	    ]);
		?>

	    <?= $this->render('sales-retur/_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
