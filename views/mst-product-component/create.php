<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MstProductComponent */

$this->title = 'Tambah Komponen';
$this->params['breadcrumbs'][] = ['label' => 'Master Komponen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body mst-product-component-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
