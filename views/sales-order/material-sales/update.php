<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialSales */

$this->title = 'Update Material Sales';
$this->params['breadcrumbs'][] = ['label' => 'Material Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material_sales]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-sales-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
