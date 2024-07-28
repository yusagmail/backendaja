<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Material */

$this->title = 'Update Material';
$this->params['breadcrumbs'][] = ['label' => 'Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
