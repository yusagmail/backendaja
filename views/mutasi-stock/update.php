<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MutasiStock */

$this->title = 'Update Mutasi Stock';
$this->params['breadcrumbs'][] = ['label' => 'Mutasi Stock', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mutasi_stock]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mutasi-stock-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
