<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProjectProductItem */

$this->title = 'Update Mrp Project Product Item';
$this->params['breadcrumbs'][] = ['label' => 'Mrp Project Product Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mrp_project_product_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mrp-project-product-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
