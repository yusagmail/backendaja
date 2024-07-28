<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProductItem */

$this->title = 'Update Structure Product Item';
$this->params['breadcrumbs'][] = ['label' => 'Structure Product Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_structure_product_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body structure-product-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
