<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesRetur */

$this->title = 'Update Sales Retur';
$this->params['breadcrumbs'][] = ['label' => 'Sales Retur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sales_retur]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sales-retur-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
