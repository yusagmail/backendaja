<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameItem */

$this->title = 'Update Stock Opname Item';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_stock_opname_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body stock-opname-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
