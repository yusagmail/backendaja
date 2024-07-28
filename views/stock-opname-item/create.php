<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameItem */

$this->title = 'Tambah Stock Opname Item';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body stock-opname-item-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
