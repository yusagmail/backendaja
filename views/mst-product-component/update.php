<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstProductComponent */

$this->title = 'Update Mst Product Component';
$this->params['breadcrumbs'][] = ['label' => 'Mst Product Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mst_product_component]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mst-product-component-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
