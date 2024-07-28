<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesJurnal */

$this->title = 'Update Pembayaran Bertahap';
$this->params['breadcrumbs'][] = ['label' => 'Sales Jurnal', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_sales_jurnal]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body sales-jurnal-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
