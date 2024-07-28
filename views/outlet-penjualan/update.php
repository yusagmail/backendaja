<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutletPenjualan */

$this->title = 'Update Outlet Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Outlet Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_outlet_penjualan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body outlet-penjualan-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
