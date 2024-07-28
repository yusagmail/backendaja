<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialFinish */

$this->title = 'Update Material Finish';
$this->params['breadcrumbs'][] = ['label' => 'Material Finish', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_material_finish]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body material-finish-update">

	    <?= $this->render('_view_update', [
	        'model' => $model,
	    ]) ?>

	    <?= $this->render('_form_update', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
