<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PalletGudang */

$this->title = 'Update Pallet Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Pallet Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_pallet_gudang]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body pallet-gudang-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
