<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProductItem */

$this->title = 'Tambah Structure Product Item';
$this->params['breadcrumbs'][] = ['label' => 'Structure Product Item', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body structure-product-item-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
