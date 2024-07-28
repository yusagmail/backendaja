<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStockItem */

$this->title = 'Tambah Mutasi Stock Item';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mutasi-stock-item-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
