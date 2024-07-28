<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProduct */

$this->title = 'Update Structure Product';
$this->params['breadcrumbs'][] = ['label' => 'Structure Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_structure_product]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body structure-product-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
