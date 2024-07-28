<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UnitProduksi */

$this->title = 'Update Unit Produksi';
$this->params['breadcrumbs'][] = ['label' => 'Unit Produksi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_unit_produksi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body unit-produksi-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
