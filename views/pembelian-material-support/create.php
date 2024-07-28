<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PembelianMaterialSupport */

$this->title = 'Tambah Pembelian Material Support';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Material Support', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body pembelian-material-support-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
