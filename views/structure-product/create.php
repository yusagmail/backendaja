<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\StructureProduct */

$this->title = 'Tambah Structure Product';
$this->params['breadcrumbs'][] = ['label' => 'Structure Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body structure-product-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
