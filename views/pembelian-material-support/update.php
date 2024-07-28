<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PembelianMaterialSupport */

$this->title = 'Update Pembelian Material Support';
$this->params['breadcrumbs'][] = ['label' => 'Pembelian Material Support', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_pembelian_material_support]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body pembelian-material-support-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
