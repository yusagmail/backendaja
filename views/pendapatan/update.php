<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialIn */

$this->title = 'Update Material In';
$this->params['breadcrumbs'][] = ['label' => 'Material In', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material_in]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-in-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
