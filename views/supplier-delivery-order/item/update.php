<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SupplierDoItem */

$this->title = 'Update Supplier Do Item';
$this->params['breadcrumbs'][] = ['label' => 'Supplier Do Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_supplier_do_item]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body supplier-do-item-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
