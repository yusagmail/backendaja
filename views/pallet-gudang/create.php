<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PalletGudang */

$this->title = 'Tambah Pallet Gudang';
$this->params['breadcrumbs'][] = ['label' => 'Pallet Gudang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pallet-gudang-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
