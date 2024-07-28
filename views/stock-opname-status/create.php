<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StockOpnameStatus */

$this->title = 'Tambah Stock Opname Status';
$this->params['breadcrumbs'][] = ['label' => 'Stock Opname Status', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body stock-opname-status-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
