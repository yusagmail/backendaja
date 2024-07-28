<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameStatus */

$this->title = 'Update Stock Opname Status';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_stock_opname_status]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body stock-opname-status-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
