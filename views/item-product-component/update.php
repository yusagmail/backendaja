<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemProductComponent */

$this->title = 'Update Item Product Component';
$this->params['breadcrumbs'][] = ['label' => 'Item Product Component', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_item_product_component]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body item-product-component-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
