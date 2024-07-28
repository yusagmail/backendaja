<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockItem */

$this->title = 'Update Mutasi Stock Item';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mutasi_stock_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mutasi-stock-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
