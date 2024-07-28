<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\OutletPenjualan */

$this->title = 'Tambah Outlet Penjualan';
$this->params['breadcrumbs'][] = ['label' => 'Outlet Penjualan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body outlet-penjualan-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
