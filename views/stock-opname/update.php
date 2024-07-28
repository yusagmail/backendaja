<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpname */

$this->title = 'Update Stock Opname';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_stock_opname]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body stock-opname-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
