<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MrpProject */

$this->title = 'Update Project';
$this->params['breadcrumbs'][] = ['label' => 'Project', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Detail', 'url' => ['view', 'id' => $model->id_mrp_project]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
	<div class="box-body mrp-project-update">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
