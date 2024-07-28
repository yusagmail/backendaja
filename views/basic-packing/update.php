<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\BasicPacking */

$this->title = 'Update Basic Packing';
$this->params['breadcrumbs'][] = ['label' => 'Basic Packing', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_basic_packing]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body basic-packing-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
